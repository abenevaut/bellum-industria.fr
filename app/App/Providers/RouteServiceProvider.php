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
	protected $namespace = 'cms\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
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
	 * @return void
	 */
	public function map()
	{
		if (file_exists(base_path('app/apps.json')))
		{
			$apps = json_decode(file_get_contents(base_path('app/apps.json')));

			foreach ($apps->apps as $app)
			{
				Route::group([
					'middleware' => 'web',
					'namespace' => "cms\\$app\Http\Controllers"
				], function ($router) use ($app)
				{
					require base_path("app/$app/Http/routes.php");
				});
			}
		}

		$this->mapWebRoutes();
		$this->mapApiRoutes();
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
			'namespace'  => $this->namespace,
		], function ($router)
		{
			require base_path('routes/web.php');
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
			'namespace'  => $this->namespace,
			'prefix'     => 'api',
		], function ($router)
		{
			require base_path('routes/api.php');
		});
	}
}
