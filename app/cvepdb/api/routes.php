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

// Group API
Route::group(['domain' => env('DOMAIN_API')], function () {
    Route::group(['prefix' => 'v1'], function () {

        Route::get('users/{id}', '\App\CVEPDB\Api\Controllers\UsersController@show');
        Route::get('users', '\App\CVEPDB\Api\Controllers\UsersController@all');

    });
});