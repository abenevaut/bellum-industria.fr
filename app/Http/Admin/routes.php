<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web', 'CMSInstalled']], function () {

    // Registration routes...
//    Route::get('register', '\App\Http\Admin\Auth\AuthController@getRegister');
//    Route::post('register', '\App\Http\Admin\Auth\AuthController@postRegister');

    // Authentication routes...
    Route::get('login', '\App\Http\Admin\Auth\AuthController@getLogin');
    Route::post('login', '\App\Http\Admin\Auth\AuthController@postLogin');
    Route::get('logout', '\App\Http\Admin\Auth\AuthController@getLogout');

    Route::group(['prefix' => 'password'], function () {

        // Password reset link request routes...
        Route::get('reset', '\App\Http\Admin\Auth\PasswordController@getEmail');
        Route::post('email', '\App\Http\Admin\Auth\PasswordController@postEmail');

        // Password reset routes...
        Route::get('reset/{token}', '\App\Http\Admin\Auth\PasswordController@getReset');
        Route::post('reset', '\App\Http\Admin\Auth\PasswordController@postReset');

    });

});