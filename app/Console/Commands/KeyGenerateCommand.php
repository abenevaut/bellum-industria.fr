<?php namespace cms\Console\Commands;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use cms\Infrastructure\Abstractions\Console\CommandAbstract;

/**
 * Class KeyGenerateCommand
 * @package cms\Console\Commands
 */
class KeyGenerateCommand extends CommandAbstract
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cms:key-generate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Set the core key in current .env file';

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		parent::fire();

		$app = $this->laravel;

		$key = $this->getRandomKey($app['config']['app.cipher']);

		if ($this->option('show'))
		{
			return $this->line('<comment>' . $key . '</comment>');
		}

		$env_file = (0 === strcmp('.env', $app->environmentFile()))
			? $app->environmentFile() . '.' . env('APP_ENV')
			: $app->environmentFile();

		$path = $app->environmentPath() . '/' . $env_file;

		if (file_exists($path))
		{
			$content = str_replace('APP_KEY=' . $app['config']['app.key'], 'APP_KEY=' . $key, file_get_contents($path));

			if (!Str::contains($content, 'APP_KEY'))
			{
				$content = sprintf("%s\APP_KEY=%s\n", $content, $key);
			}

			file_put_contents($path, $content);
		}

		$app['config']['app.key'] = $key;

		$this->info("#CVEPDB CMS key [$key] set successfully.");
	}

	/**
	 * Generate a random key for the application.
	 *
	 * @param  string $cipher
	 *
	 * @return string
	 */
	protected function getRandomKey($cipher)
	{
		if ($cipher === 'AES-128-CBC')
		{
			return Str::random(16);
		}

		return Str::random(32);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['show', null, InputOption::VALUE_NONE, 'Simply display the key instead of modifying files.'],
		];
	}

}
