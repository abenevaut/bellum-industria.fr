<?php namespace Core\Providers;

use Illuminate\Support\ServiceProvider as BaseService;

class PhoenixServiceProvider extends BaseService
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Booting
     */
    public function boot()
    {
        $this->app->bind(
            'phoenix.metable',
            'Core\Console\Commands\CreateMetaTableCommand'
        );

        $this->commands('phoenix.metable');

        $this->publishes([
            __DIR__.'/../../migrations/' => base_path('/database/migrations')
        ], 'migrations');
    }

    /**
     * Register the commands
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
