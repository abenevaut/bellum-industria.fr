<?php namespace Core\Console\Commands;

use Pingpong\Themes\Theme;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class ThemesPublishCommand
 * @package Core\Console\Commands
 */
class ThemesPublishCommand extends CoreCommand
{

	/**
	 * Command name.
	 *
	 * @var string
	 */
	protected $name = 'cms:theme:publish';

	/**
	 * Command description.
	 *
	 * @var string
	 */
	protected $description = 'Publish theme\'s assets';

	/**
	 * @var
	 */
	protected $progressbar;

	/**
	 * Execute command.
	 */
	public function fire()
	{
		parent::fire();

		if ($theme = $this->argument('name'))
		{
			$this->publish($theme);
		}
		else
		{
			$this->publishAll();
		}
	}

	/**
	 * Publish all themes.
	 */
	protected function publishAll()
	{
		foreach ($this->laravel['themes']->all() as $theme)
		{
			$this->publish($theme);
		}
	}

	/**
	 * Publish theme.
	 *
	 * @param mixed $theme
	 */
	protected function publish($theme)
	{
		$theme = $theme instanceof Theme ? $theme : $this->laravel['themes']->find($theme);

		if (!is_null($theme))
		{
			$assetsPath = $theme->getPath('assets');

//			$this->installBowerDependencies($assetsPath);

			$destinationPath = public_path('themes/' . $theme->getLowerName());

			$this->laravel['files']->copyDirectory($assetsPath, $destinationPath);

			$this->line("Asset published from: <info>{$theme->getName()}</info>");
		}
	}

	/**
	 * @param $assetsPath
	 *
	 * xAbe Todo : Follow bowerphp : https://github.com/Bee-Lab/bowerphp/issues/144#issuecomment-220563159
	 */
	protected function installBowerDependencies($assetsPath)
	{
		if (file_exists($assetsPath . '/bower.json'))
		{
			$bower = base_path('bin/bowerphp');

			$this->progressbar = $this->output->createProgressBar(1);
			$this->progressbar->setFormat("%message%\n %current%/%max% [%bar%] %percent:3s%%");

			$output = array();
			$return_var = -1;
			$command = "$bower -vvvv --working-dir=\"$assetsPath\" install";
			$this->line("Bower running : <info>{$command}</info>");
			$last_line = exec($command, $output, $return_var);

			$this->progressbar->setMessage($command);
			$this->progressbar->advance();
			$this->progressbar->finish();

			if ($return_var !== 0)
			{
				// fail or other exceptions
				throw new \Exception(implode("\n", $output));
			}
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['name', InputArgument::OPTIONAL, 'The name of the theme being used.'],
		];
	}

}
