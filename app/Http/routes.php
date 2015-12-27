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
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Group Vitrine
Route::group(['prefix' => '/'], function () {

    Route::get('/', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('index', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('home', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('about', '\App\CVEPDB\Vitrine\Controllers\IndexController@about');
    Route::get('services', '\App\CVEPDB\Vitrine\Controllers\IndexController@services');
    Route::get('contact', '\App\CVEPDB\Vitrine\Controllers\IndexController@contact');
    Route::get('contact', ['as' => 'contact', 'uses' => '\App\CVEPDB\Vitrine\Controllers\AboutController@create']);
    Route::post('contact', ['as' => 'contact_store', 'uses' => '\App\CVEPDB\Vitrine\Controllers\AboutController@store']);

    Route::group(['prefix' => 'portfolio'], function () {

        Route::get('index', '\App\CVEPDB\Vitrine\Controllers\PortfolioController@index');
        Route::get('view', '\App\CVEPDB\Vitrine\Controllers\PortfolioController@view');

    });
});

// Group Clients
Route::group(['prefix' => 'clients'], function () {

    Route::get('users', '\App\CVEPDB\Clients\Controllers\UsersController@index');

});

// Group Multigaming
Route::group(['prefix' => 'multigaming'], function () {

    Route::get('login', '\App\CVEPDB\Multigaming\Controllers\AuthController@login');

});

// Group API
Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {

        Route::get('users/{id}', '\App\CVEPDB\Api\Controllers\UsersController@show');
        Route::get('users', '\App\CVEPDB\Api\Controllers\UsersController@all');

    });
});