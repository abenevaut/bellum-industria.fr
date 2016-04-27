<?php namespace Core\Console\Commands;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class KeyGenerateCommand
 * @package Core\Console\Commands
 */
class KeyGenerateCommand extends CoreCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cms:key_generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the core key';

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

        if ($this->option('show')) {
            return $this->line('<comment>' . $key . '</comment>');
        }

        $path = $app->environmentPath() . '/' . $app->environmentFile();

        $this->line('<comment> PATH :: ' . $path . '</comment>');

        if (file_exists($path)) {
            $content = str_replace('CORE_KEY=' . $app['config']['app.key'], 'CORE_KEY=' . $key, file_get_contents($path));

            if (!Str::contains($content, 'CORE_KEY')) {
                $content = sprintf("%s\nCORE_KEY=%s\n", $content, $key);
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
     * @return string
     */
    protected function getRandomKey($cipher)
    {
        if ($cipher === 'AES-128-CBC') {
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
