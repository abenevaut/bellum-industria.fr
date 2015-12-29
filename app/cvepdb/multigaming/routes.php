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

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', '\App\CVEPDB\Multigaming\Controllers\AuthController@login');
        Route::get('logout', '\App\CVEPDB\Multigaming\Controllers\AuthController@logout');
    });

    Route::group(['prefix' => 'teams'], function () {
        Route::get('/', ['as' => 'teams', 'uses' => '\App\CVEPDB\Multigaming\Controllers\TeamController@getIndex']);
        Route::get('show/{team_id?}', '\App\CVEPDB\Multigaming\Controllers\TeamController@getShow');
        Route::post('store-team', ['as' => 'teams_store', 'uses' => '\App\CVEPDB\Multigaming\Controllers\TeamController@postStoreTeam']);
    });
});
