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

    Route::resource('index', '\App\Multigaming\Controllers\IndexController');
    Route::get('/', '\App\Multigaming\Controllers\IndexController@index');
    Route::get('boutique', '\App\Multigaming\Controllers\IndexController@boutique');
    Route::get('sitemap', '\App\Multigaming\Controllers\IndexController@sitemap');

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', '\App\Multigaming\Controllers\AuthController@login');
        Route::get('logout', '\App\Multigaming\Controllers\AuthController@logout');
    });

    Route::group(['prefix' => 'teams', 'middleware' => ['role:admin']], function () {
        Route::get('/', ['as' => 'teams', 'uses' => '\App\Multigaming\Controllers\TeamController@getIndex']);
        Route::get('show/{team_id?}', '\App\Multigaming\Controllers\TeamController@getShow');
        Route::get('store-team/{team_id?}', ['as' => 'teams_put', 'uses' => '\App\Multigaming\Controllers\TeamController@putStoreTeam']);
        Route::put('store-team/{team_id?}', ['as' => 'teams_put', 'uses' => '\App\Multigaming\Controllers\TeamController@putStoreTeam']);
        Route::post('store-team', ['as' => 'teams_store', 'uses' => '\App\Multigaming\Controllers\TeamController@postStoreTeam']);
        Route::delete('remove-team/{team_id?}', ['as' => 'teams_delete', 'uses' => '\App\Multigaming\Controllers\TeamController@deleteRemoveTeam']);
        Route::get('sitemap', ['as' => 'teams_sitemap', 'uses' => '\App\Multigaming\Controllers\TeamController@getSitemap']);
    });
});
