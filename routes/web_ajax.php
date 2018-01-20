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
 * Ajax routes.
 */
Route::group(['prefix' => 'ajax', 'as' => 'ajax.', 'namespace' => 'Ajax'], function ()
{

	/**
	 *
	 */

	Route::resource('locales', 'LocalesController');

	/**
	 *
	 */

	Route::resource('timezones', 'TimeZonesController');

	/**
	 * USERS ROUTES
	 */

	Route::group(['prefix' => 'users', 'as' => 'users.', 'namespace' => 'Users'], function () {
		Route::group(['prefix' => 'profiles', 'as' => 'profiles.'], function () {
			Route::put('change-sidebar-pin-status', ['as' => 'change_sidebar_pin_status', 'uses' => 'ProfilesController@ajaxChangeSidebarPinStatus']);
		});
		Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
			Route::get('check-user-email', ['as' => 'check_user_email', 'uses' => 'UsersController@ajaxCheckUserEmail']);
		});
		Route::resource('users', 'UsersController');
	});
});
