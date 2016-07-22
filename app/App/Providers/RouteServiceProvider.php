<?php namespace cms\App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider
 * @package cms\App\Providers
 */
class RouteServiceProvider extends ServiceProvider
{

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
		if (file_exists(base_path('app/Http/routes.php')))
		{
			$router->group(['namespace' => $this->namespace_app], function ($router)
			{
				require base_path('app/Http/routes.php');
			});
		}
	}

}
