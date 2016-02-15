<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    //    protected $namespace = 'App\Http\Controllers';
    protected $namespace_auth = 'App\Auth\Controllers';
    protected $namespace_client = 'App\Client\Controllers';
    protected $namespace_admin = 'App\Admin\Controllers';
    protected $namespace_vitrine = 'App\Vitrine\Controllers';
    protected $namespace_multigaming = 'App\Multigaming\Controllers';
    protected $namespace_api = 'App\API\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        //        $router->group(['namespace' => $this->namespace], function ($router) {
        //            require app_path('Http/routes.php');
        //        });

        /*
        |--------------------------------------------------------------------------
        | Auth Router
        |--------------------------------------------------------------------------
        */

        $router->group(['namespace' => $this->namespace_auth], function ($router) {
            require app_path('Auth/routes.php');
        });

        /*
        |--------------------------------------------------------------------------
        | Client Router
        |--------------------------------------------------------------------------
        */

        $router->group(['namespace' => $this->namespace_client], function ($router) {
            require app_path('Client/routes.php');
        });

        /*
        |--------------------------------------------------------------------------
        | Vitrine Router
        |--------------------------------------------------------------------------
        */

        $router->group(['namespace' => $this->namespace_vitrine], function ($router) {
            require app_path('Vitrine/routes.php');
        });

        /*
        |--------------------------------------------------------------------------
        | Admin Router
        |--------------------------------------------------------------------------
        */

        $router->group(['namespace' => $this->namespace_admin], function ($router) {
            require app_path('Admin/routes.php');
        });

        /*
        |--------------------------------------------------------------------------
        | Multigaming Router
        |--------------------------------------------------------------------------
        */

        $router->group(['namespace' => $this->namespace_multigaming], function ($router) {
            require app_path('Multigaming/routes.php');
        });

        /*
        |--------------------------------------------------------------------------
        | Api Router
        |--------------------------------------------------------------------------
        */

        $router->group(['namespace' => $this->namespace_api], function ($router) {
            require app_path('API/routes.php');
        });
    }
}
