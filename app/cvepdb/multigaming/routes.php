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

Route::group(['prefix' => 'multigaming'], function () {

    Route::get('/', '\App\CVEPDB\Multigaming\Controllers\IndexController@getIndex');
    Route::get('boutique', '\App\CVEPDB\Multigaming\Controllers\IndexController@getBoutique');
    Route::get('sitemap', '\App\CVEPDB\Multigaming\Controllers\IndexController@getSitemap');

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', '\App\CVEPDB\Multigaming\Controllers\AuthController@login');
        Route::get('logout', '\App\CVEPDB\Multigaming\Controllers\AuthController@logout');
    });

    Route::group(['prefix' => 'teams'], function () {
        Route::get('/', ['as' => 'teams', 'uses' => '\App\CVEPDB\Multigaming\Controllers\TeamController@getIndex']);
        Route::get('show/{team_id?}', '\App\CVEPDB\Multigaming\Controllers\TeamController@getShow');
        Route::get('store-team/{team_id?}', ['as' => 'teams_put', 'uses' => '\App\CVEPDB\Multigaming\Controllers\TeamController@putStoreTeam']);
        Route::post('store-team', ['as' => 'teams_store', 'uses' => '\App\CVEPDB\Multigaming\Controllers\TeamController@postStoreTeam']);
        Route::delete('remove-team/{team_id?}', ['as' => 'teams_delete', 'uses' => '\App\CVEPDB\Multigaming\Controllers\TeamController@deleteRemoveTeam']);
        Route::get('sitemap', ['as' => 'teams_sitemap', 'uses' => '\App\CVEPDB\Multigaming\Controllers\TeamController@getSitemap']);
    });
});
