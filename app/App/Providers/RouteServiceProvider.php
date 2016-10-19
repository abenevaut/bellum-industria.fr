<?php namespace cms\App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider
 * @package cms\App\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

	/**
	 * This namespace is applied to the controller routes in your app routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace_app = 'cms\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 *
	 * @return void
	 */
	public function map(Router $router)
	{
		if (file_exists(base_path('app/Http/routes.php')))
		{
			$router->group(['namespace' => $this->namespace_app], function ($router)
			{
				require base_path('app/Http/routes.php');
			});
		}

		if (file_exists(base_path('app/apps.json')))
		{
			$apps = json_decode(file_get_contents(base_path('app/apps.json')));

			foreach ($apps->apps as $app)
			{
				$router->group(['namespace' => "App\$app\Http\Controllers"], function ($router) use ($app)
				{
					require base_path("app/$app/Http/routes.php");
				});
			}
		}

		// Laravel 5.3

		//$this->mapApiRoutes();

		//$this->mapWebRoutes();
	}

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require app_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require app_path('routes/api.php');
        });
    }
}
