<?php

//Route::group(['middleware' => 'web', 'prefix' => 'users', 'namespace' => 'Modules\Users\Http\Controllers'], function()
//{
//	Route::get('/', 'UsersController@index');
//});

Route::group(['middleware' => ['web', 'CMSInstalled']], function () {

	// Registration routes...
	Route::get('register', '\Modules\Users\Http\Controllers\Auth\AuthController@getRegister');
	Route::post('register', '\Modules\Users\Http\Controllers\Auth\AuthController@postRegister');

	// Authentication routes...
	Route::get('login', '\Modules\Users\Http\Controllers\Auth\AuthController@getLogin');
	Route::post('login', '\Modules\Users\Http\Controllers\Auth\AuthController@postLogin');
	Route::get('logout', '\Modules\Users\Http\Controllers\Auth\AuthController@getLogout');

	Route::group(['prefix' => 'password'], function () {

		// Password reset link request routes...
		Route::get('reset', '\Modules\Users\Http\Controllers\Auth\PasswordController@getEmail');
		Route::post('email', '\Modules\Users\Http\Controllers\Auth\PasswordController@postEmail');

		// Password reset routes...
		Route::get('reset/{token}', '\Modules\Users\Http\Controllers\Auth\PasswordController@getReset');
		Route::post('reset', '\Modules\Users\Http\Controllers\Auth\PasswordController@postReset');

	});

});

Route::group(['middleware' => ['web', 'CMSInstalled'], 'prefix' => 'admin', 'namespace' => 'Modules\Users\Http\Controllers'], function()
{
	// Authentication routes...
	Route::get('login', '\Modules\Users\Http\Controllers\Auth\AuthAdminController@getLogin');
	Route::post('login', '\Modules\Users\Http\Controllers\Auth\AuthAdminController@postLogin');
	Route::get('logout', '\Modules\Users\Http\Controllers\Auth\AuthAdminController@getLogout');
});

Route::group(['middleware' => ['web', 'CMSInstalled', /*'CMSUserImpersonate',*/ 'auth', 'role:admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Users\Http\Controllers'], function()
{
	Route::resource('users', 'AdminUsersController');
	Route::resource('roles', 'AdminRolesController');
});
