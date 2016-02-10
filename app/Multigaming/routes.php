<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['domain' => env('DOMAIN_MULTIGAMING')], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', '\App\Multigaming\Controllers\AuthController@login');
        Route::get('logout', '\App\Multigaming\Controllers\AuthController@logout');
    });

    Route::resource('index', '\App\Multigaming\Controllers\IndexController');
    Route::get('/', '\App\Multigaming\Controllers\IndexController@index');
    Route::get('boutique', '\App\Multigaming\Controllers\IndexController@boutique');
    Route::get('challenge', '\App\Multigaming\Controllers\IndexController@challenge');
    Route::get('message-of-the-day', '\App\Multigaming\Controllers\IndexController@messageoftheday');
    Route::get('sitemap', '\App\Multigaming\Controllers\IndexController@sitemap');
    Route::get('sitemap-teams', ['as' => 'teams.sitemap', 'uses' => '\App\Multigaming\Controllers\TeamController@sitemap']);

    Route::group(['middleware' => ['role:admin,gamer-admin']], function () {
        Route::resource('teams', '\App\Multigaming\Controllers\TeamController');
    });
});
