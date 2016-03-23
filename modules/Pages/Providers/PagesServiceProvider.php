<?php namespace Modules\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Module;
use Config;

class PagesServiceProvider extends ServiceProvider {

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
//		$this->preparePagesURIPattern();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		//
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('pages.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'pages'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/pages');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom(array_merge(array_map(function ($path) {
			return $path . '/modules/pages';
		}, \Config::get('view.paths')), [$sourcePath]), 'pages');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/pages');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'pages');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'pages');
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

	/**
	 * Add pattern to exclude for pages URI search (pages.route_pattern)
	 */
	private function preparePagesURIPattern()
	{
		$patterns = config('pages.route_pattern');
		foreach (Module::all() as $module) {
			$patterns .= '|' . $module->name;
		}
		Config::set('pages.route_pattern', $patterns);
	}

}
