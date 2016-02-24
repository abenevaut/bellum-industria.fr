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

        Route::resource('users', '\App\Api\Controllers\UserController');

        Route::get('dates/french_hollidays', '\App\Api\Controllers\DateController@french_hollidays');
        Route::get('dates/french_hollidays/{year}', '\App\Api\Controllers\DateController@french_hollidays');

    });
});