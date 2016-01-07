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

// Group Vitrine
Route::group(['domain' => env('DOMAIN_CVEPDB')], function () {

    Route::get('/', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('index', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('home', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('about', '\App\CVEPDB\Vitrine\Controllers\IndexController@about');
    Route::get('services', '\App\CVEPDB\Vitrine\Controllers\IndexController@services');
    Route::get('boutique', '\App\CVEPDB\Vitrine\Controllers\IndexController@boutique');
    Route::get('contact', '\App\CVEPDB\Vitrine\Controllers\IndexController@contact');
    Route::get('contact', ['as' => 'contact', 'uses' => '\App\CVEPDB\Vitrine\Controllers\AboutController@create']);
    Route::post('contact', ['as' => 'contact_store', 'uses' => '\App\CVEPDB\Vitrine\Controllers\AboutController@store']);

    // Authentication routes...
    Route::group(['prefix' => 'auth'], function () {
        // Registration routes...
        Route::get('register', '\App\Http\Controllers\Auth\AuthController@getRegister');
        Route::post('register', '\App\Http\Controllers\Auth\AuthController@postRegister');

        // Authentication routes...
        Route::get('login', '\App\Http\Controllers\Auth\AuthController@getLogin');
        Route::post('login', '\App\Http\Controllers\Auth\AuthController@postLogin');
        Route::get('logout', '\App\Http\Controllers\Auth\AuthController@getLogout');

        // Social Login
        Route::get('login/{provider?}', ['uses' => '\App\Http\Controllers\Auth\AuthController@redirectToProvider']);
        // Login callbacks
        Route::get('login/callback/{provider?}', ['uses' => '\App\Http\Controllers\Auth\AuthController@handleProviderCallback']);
    });

    Route::group(['prefix' => 'password'], function () {
        // Password reset link request routes...
        Route::get('email', '\App\Http\Controllers\Auth\PasswordController@getEmail');
        Route::post('email', '\App\Http\Controllers\Auth\PasswordController@postEmail');
        // Password reset routes...
        Route::get('reset/{token}', '\App\Http\Controllers\Auth\PasswordController@getReset');
        Route::post('reset', '\App\Http\Controllers\Auth\PasswordController@postReset');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        Route::get('dashboard', '\App\CVEPDB\Vitrine\Controllers\Admin\DashboardController@index');
        Route::get('contacts', '\App\CVEPDB\Vitrine\Controllers\Admin\ContactController@index');
        Route::get('roles', '\App\CVEPDB\Vitrine\Controllers\Admin\RoleController@index');
        Route::get('permissions', '\App\CVEPDB\Vitrine\Controllers\Admin\PermissionController@index');
        Route::get('users', '\App\CVEPDB\Vitrine\Controllers\Admin\UserController@index');
    });
});
