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

// Authentication routes...
//Route::group(['prefix' => 'auth'], function () {
//    // Registration routes...
//    Route::get('register', 'Auth\AuthController@getRegister');
//    Route::post('register', 'Auth\AuthController@postRegister');
//
//    // Authentication routes...
//    Route::get('login', 'Auth\AuthController@getLogin');
//    Route::post('login', 'Auth\AuthController@postLogin');
//    Route::get('logout', 'Auth\AuthController@getLogout');
//
//    // Social Login
//    Route::get('login/{provider?}', ['uses' => 'Auth\AuthController@redirectToProvider']);
//    // Login callbacks
//    Route::get('login/callback/{provider?}', ['uses' => 'Auth\AuthController@handleProviderCallback']);
//
//});
//
//Route::group(['prefix' => 'password'], function () {
//    // Password reset link request routes...
//    Route::get('email', 'Auth\PasswordController@getEmail');
//    Route::post('email', 'Auth\PasswordController@postEmail');
//    // Password reset routes...
//    Route::get('reset/{token}', 'Auth\PasswordController@getReset');
//    Route::post('reset', 'Auth\PasswordController@postReset');
//});

// Group Vitrine
Route::group(['prefix' => '/'], function () {

    Route::get('/', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('index', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('home', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('about', '\App\CVEPDB\Vitrine\Controllers\IndexController@about');
    Route::get('services', '\App\CVEPDB\Vitrine\Controllers\IndexController@services');
    Route::get('boutique', '\App\CVEPDB\Vitrine\Controllers\IndexController@boutique');
    Route::get('contact', '\App\CVEPDB\Vitrine\Controllers\IndexController@contact');
    Route::get('contact', ['as' => 'contact', 'uses' => '\App\CVEPDB\Vitrine\Controllers\AboutController@create']);
    Route::post('contact', ['as' => 'contact_store', 'uses' => '\App\CVEPDB\Vitrine\Controllers\AboutController@store']);

    Route::group(['prefix' => 'portfolio'], function () {

        Route::get('index', '\App\CVEPDB\Vitrine\Controllers\PortfolioController@index');
        Route::get('view', '\App\CVEPDB\Vitrine\Controllers\PortfolioController@view');

    });
});
