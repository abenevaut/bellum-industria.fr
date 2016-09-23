<?php namespace cms\App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package cms\App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		if (cmsinstalled() && !empty(config('services.raven.dsn'))) {
			$this->app->register(\Jenssegers\Raven\RavenServiceProvider::class);
		}
    }
}
