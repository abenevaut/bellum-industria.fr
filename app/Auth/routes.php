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

// Group Auth
Route::group(['domain' => env('DOMAIN_CVEPDB')], function () {
    // Authentication routes...
    Route::group(['prefix' => 'auth'], function () {
        // Registration routes...
//        Route::get('register', '\CVEPDB\Controllers\Auth\AuthController@getRegister');
//        Route::post('register', '\CVEPDB\Controllers\Auth\AuthController@postRegister');
        // Authentication routes...
        Route::get('login', '\CVEPDB\Controllers\Auth\AuthController@getLogin');
        Route::post('login', '\CVEPDB\Controllers\Auth\AuthController@postLogin');
        Route::get('logout', '\CVEPDB\Controllers\Auth\AuthController@getLogout');

        // Social Login
        Route::get('login/{provider?}', ['uses' => '\CVEPDB\Controllers\Auth\AuthController@redirectToProvider']);
        // Login callbacks
        Route::get('login/callback/{provider?}', ['uses' => '\CVEPDB\Controllers\Auth\AuthController@handleProviderCallback']);
    });

    Route::group(['prefix' => 'password'], function () {
        // Password reset link request routes...
        Route::get('email', '\CVEPDB\Controllers\Auth\PasswordController@getEmail');
        Route::post('email', '\CVEPDB\Controllers\Auth\PasswordController@postEmail');
        // Password reset routes...
        Route::get('reset/{token}', '\CVEPDB\Controllers\Auth\PasswordController@getReset');
        Route::post('reset', '\CVEPDB\Controllers\Auth\PasswordController@postReset');
    });
});
