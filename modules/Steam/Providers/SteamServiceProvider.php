<?php namespace Modules\Steam\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Steam\Repositories\SteamAuth;

/**
 * Class SteamServiceProvider
 * @package Modules\Steam\Providers
 */
class SteamServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerTranslations();
		$this->registerConfig();
		$this->registerViews();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['steamauth'] = $this->app->share(function () {
		
			return new SteamAuth();
		});
	}

	/**
	 * Register config.
	 *
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
			__DIR__ . '/../Config/config.php' => config_path('steam.php'),
		]);
		$this->mergeConfigFrom(
      __DIR__ . '/../Config/config.php',
      'steam'
		);

		/*
		 * Invisnik\LaravelSteamAuth overload
		 */

		$this->publishes([
			__DIR__ . '/../Config/steam-auth.php' => config_path('steam-auth.php'),
		]);
		$this->mergeConfigFrom(
      __DIR__ . '/../Config/steam-auth.php',
      'steam-auth'
		);
	}

	/**
	 * Register views.
	 *
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/steam');

		$sourcePath = __DIR__ . '/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom(array_merge(array_map(function ($path) {
		
			return $path . '/modules/steam';
		}, \Config::get('view.paths')), [$sourcePath]), 'steam');
	}

	/**
	 * Register translations.
	 *
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/steam');

		if (is_dir($langPath))
		{
			$this->loadTranslationsFrom($langPath, 'steam');
		}
		else
		{
			$this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'steam');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
