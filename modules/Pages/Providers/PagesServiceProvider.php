<?php namespace Modules\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Module;
use Config;
use Modules\Pages\Repositories\PagesRepositoryEloquent;
use Illuminate\Routing\Router;

class PagesServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * @var PagesRepositoryEloquent|null
	 */
	protected $r_page = null;

	/**
	 * @var Router|null
	 */
	protected $router = null;

	/**
	 * Boot the application events.
	 *
	 * @return void
	 */
	public function boot(Router $router, PagesRepositoryEloquent $r_page)
	{
		$this->r_page = $r_page;
		$this->router = $router;

		$this->registerTranslations();
		$this->registerConfig();
		$this->registerViews();
		$this->registerRoutes();
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
			__DIR__ . '/../Config/config.php' => config_path('pages.php'),
		]);
		$this->mergeConfigFrom(
      __DIR__ . '/../Config/config.php',
	  'pages'
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

		$sourcePath = __DIR__ . '/../Resources/views';

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
			$this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'pages');
		}
	}

	public function registerRoutes()
	{
		if (cmsinstalled()) {
			// xABE Todo :: CACHE THIS
			$pages = $this->r_page->findWhere(['is_home' => 0]);

			$config['namespace'] = 'Modules\Pages\Http\Controllers';
			$config['middleware'] = ['web'];

			if ($pages->count()) {
				$this->router->group($config, function ($router) use ($pages) {
					foreach ($pages as $page) {
						$router->get($page->uri, 'PagesController@map');
					}
				});
			}
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
