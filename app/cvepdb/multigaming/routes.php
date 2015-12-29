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

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', '\App\CVEPDB\Multigaming\Controllers\AuthController@login');
        Route::get('logout', '\App\CVEPDB\Multigaming\Controllers\AuthController@logout');
    });

    Route::controller('teams', '\App\CVEPDB\Multigaming\Controllers\TeamController');
    Route::controller('/', '\App\CVEPDB\Multigaming\Controllers\IndexController');
});
