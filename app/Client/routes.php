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

// Group Client
Route::group(['domain' => env('DOMAIN_CVEPDB')], function () {
    Route::group(['prefix' => 'clients', 'middleware' => ['role:client']], function () {

        Route::resource('dashboard', '\App\Client\Controllers\DashboardController');
        Route::get('/', '\App\Client\Controllers\DashboardController@index');

        Route::get('entites/join', '\App\Client\Controllers\EntiteController@join');
        Route::resource('entites', '\App\Client\Controllers\EntiteController');

    });
});
