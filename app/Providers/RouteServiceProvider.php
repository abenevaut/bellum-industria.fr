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
    protected $namespace_vitrine = 'App\CVEPDB\Vitrine\Controllers';
    protected $namespace_multigaming = 'App\CVEPDB\Multigaming\Controllers';
    protected $namespace_api = 'App\CVEPDB\Api\Controllers';

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
        | Vitrine Router
        |--------------------------------------------------------------------------
        */

        $router->group(['namespace' => $this->namespace_vitrine], function ($router) {
            require app_path('cvepdb/vitrine/routes.php');
        });

        /*
        |--------------------------------------------------------------------------
        | Multigaming Router
        |--------------------------------------------------------------------------
        */

        $router->group(['namespace' => $this->namespace_multigaming], function ($router) {
            require app_path('cvepdb/multigaming/routes.php');
        });

        /*
        |--------------------------------------------------------------------------
        | Api Router
        |--------------------------------------------------------------------------
        */

        $router->group(['namespace' => $this->namespace_api], function ($router) {
            require app_path('cvepdb/api/routes.php');
        });
    }
}
