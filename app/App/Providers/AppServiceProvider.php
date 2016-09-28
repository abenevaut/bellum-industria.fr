<?php namespace cms\App\Providers;

use Illuminate\Foundation\AliasLoader;
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
		if (cmsinstalled() && !empty(config('services.raven.dsn')))
		{
			$this->app->register(\Jenssegers\Raven\RavenServiceProvider::class);
		}

		if ($this->app->environment('local'))
		{
			if (config('app.debug'))
			{
				$this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
				AliasLoader::getInstance([
					'Debugbar' => \Barryvdh\Debugbar\Facade::class
				])
					->register();
			}

			$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
		}
	}
}
