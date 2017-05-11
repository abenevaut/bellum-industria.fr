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

/**
 * Authentication routes.
 */
Route::group(['namespace' => 'Auth'], function ()
{
	// Registration routes.
	 Route::get('register', 'RegisterController@showRegistrationForm');
	 Route::post('register', ['as' => 'register', 'uses' => 'RegisterController@register']);

	// Authentication routes
	Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
	Route::post('login', 'LoginController@login');
	Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

	// Passwords forbidden routes
	Route::group(['prefix' => 'password', 'as' => 'password.'], function ()
	{

		// Password reset link request routes
		Route::get('reset', ['as' => 'request', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
		Route::post('email', ['as' => 'email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);

		// Password reset routes
		Route::get('reset/{token}', ['as' => 'reset-token', 'uses' => 'ResetPasswordController@showResetForm']);
		Route::post('reset', 'ResetPasswordController@reset');
	});
});
