<?php namespace Core\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Core\Providers
 */
class RouteServiceProvider extends ServiceProvider
{

	/**
	 * This namespace is applied to the controller routes in the core routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace_core = 'Core\Http\Controllers';

	/**
	 * This namespace is applied to the controller routes in your app routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace_app = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 *
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);
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
		$router->group(['namespace' => $this->namespace_core], function ($router)
		{
			require base_path('core/Http/routes.php');
		});

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
	}
}
