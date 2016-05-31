<?php

Route::group(['middleware' => ['web'], 'namespace' => 'Modules\Users\Http\Controllers\Auth'], function ()
{

	$is_registration_allowed = false;

	if (cmsinstalled())
	{
		$is_registration_allowed = \CVEPDB\Settings\Facades\Settings::get('users.is_registration_allowed');
	}

	if ($is_registration_allowed)
	{
		// Registration routes...
		Route::get('register', 'AuthController@getRegister');
		Route::post('register', 'AuthController@postRegister');
	}

	// Authentication routes...
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::get('logout', 'AuthController@getLogout');
	Route::group(['prefix' => 'password'], function ()
	{

		// Password reset link request routes...
		Route::get('reset', 'PasswordController@getEmail');
		Route::post('email', 'PasswordController@postEmail');
		// Password reset routes...
		Route::get('reset/{token}', 'PasswordController@getReset');
		Route::post('reset', 'PasswordController@postReset');
	});
	// Social Login
	Route::get('login/{provider?}', ['uses' => 'AuthController@redirectToProvider']);
	// Login callbacks
	Route::get('login/callback/{provider?}', ['uses' => 'AuthController@handleProviderCallback']);

	if ($is_registration_allowed)
	{
		// Register from social networks
		Route::get('register/{provider?}', ['uses' => 'AuthController@getRegisterFromProvider']);
		Route::post('register/{provider?}', ['uses' => 'AuthController@postRegisterFromProvider']);
	}
});

Route::group(['middleware' => ['web'], 'namespace' => 'Modules\Users\Http\Controllers'], function ()
{

	//Route::resource('users', 'UsersController');
	Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
	Route::get('users/my-profile', ['as' => 'users.my-profile', 'uses' => 'UsersController@myProfile']);
	Route::get('users/edit-my-profile', ['as' => 'users.edit-my-profile', 'uses' => 'UsersController@editMyProfile']);
	Route::put('users/update-my-profile', ['as' => 'users.update-my-profile', 'uses' => 'UsersController@updateMyProfile']);
	Route::get('users/edit-my-password', ['as' => 'users.edit-my-password', 'uses' => 'UsersController@editMyPassword']);
	Route::put('users/update-my-password', ['as' => 'users.update-my-password', 'uses' => 'UsersController@updateMyPassword']);
});

Route::group(['middleware' => ['web'], 'prefix' => 'admin', 'namespace' => 'Modules\Users\Http\Controllers\Auth'], function ()
{

	// Authentication routes...
	Route::get('login', 'AdminAuthController@getLogin');
	Route::post('login', 'AdminAuthController@postLogin');
	Route::get('logout', 'AdminAuthController@getLogout');
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Users\Http\Controllers\Admin'], function ()
{

	Route::resource('users/settings', 'SettingController');
	Route::get('users/impersonate/{id}', ['as' => 'admin.users.impersonate', 'uses' => 'UserController@impersonate']);
	Route::get('users/endimpersonate', ['as' => 'admin.users.endimpersonate', 'uses' => 'UserController@endimpersonate']);
	Route::get('users/reset-password/{id}', ['as' => 'admin.users.resetpassword', 'uses' => 'UserController@resetpassword']);
	Route::get('users/export', ['as' => 'admin.users.export', 'uses' => 'UserController@export']);
	Route::delete('users/destroy_multiple', ['as' => 'admin.users.destroy_multiple', 'uses' => 'UserController@destroy_multiple']);
	Route::delete('users/reactive/{id}', ['as' => 'admin.users.reactive', 'uses' => 'UserController@reactive']);
	Route::resource('users', 'UserController');
	Route::resource('roles', 'RoleController');
});

Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'Modules\Users\Http\Controllers\Api'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
		Route::get('users/profile', 'UserController@userProfile');
		Route::resource('users', 'UserController');
	});
});
