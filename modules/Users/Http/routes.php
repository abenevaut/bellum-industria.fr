<?php

//Route::group(['middleware' => 'web', 'prefix' => 'users', 'namespace' => 'Modules\Users\Http\Controllers'], function()
//{
//	Route::get('/', 'UsersController@index');
//});

Route::group(['middleware' => ['web'], 'namespace' => 'Modules\Users\Http\Controllers\Auth'], function () {
	// Registration routes...
	Route::get('register', 'AuthController@getRegister');
	Route::post('register', 'AuthController@postRegister');
	// Authentication routes...
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::get('logout', 'AuthController@getLogout');
	Route::group(['prefix' => 'password'], function () {
		// Password reset link request routes...
		Route::get('reset', 'PasswordController@getEmail');
		Route::post('email', 'PasswordController@postEmail');
		// Password reset routes...
		Route::get('reset/{token}', 'PasswordController@getReset');
		Route::post('reset', 'PasswordController@postReset');
	});
});

Route::group(['middleware' => ['web'], 'namespace' => 'Modules\Users\Http\Controllers'], function() {
	//Route::resource('users', 'UsersController');
	Route::get('users/my-profile', ['as' => 'users.my-profile', 'uses' => 'UsersController@myProfile']);
	Route::get('users/edit-my-profile', ['as' => 'users.edit-my-profile', 'uses' => 'UsersController@editMyProfile']);
	Route::put('users/update-my-profile', ['as' => 'users.update-my-profile', 'uses' => 'UsersController@updateMyProfile']);
});

Route::group(['middleware' => ['web'], 'prefix' => 'admin', 'namespace' => 'Modules\Users\Http\Controllers\Auth'], function() {
	// Authentication routes...
	Route::get('login', 'AdminAuthController@getLogin');
	Route::post('login', 'AdminAuthController@postLogin');
	Route::get('logout', 'AdminAuthController@getLogout');
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Users\Http\Controllers\Admin'], function() {
	Route::get('users/impersonate/{id}', ['as' => 'admin.users.impersonate', 'uses' => 'UsersController@impersonate']);
	Route::get('users/endimpersonate', ['as' => 'admin.users.endimpersonate', 'uses' => 'UsersController@endimpersonate']);
	Route::get('users/export', ['as' => 'admin.users.export', 'uses' => 'UsersController@export']);
	Route::delete('users/destroy_multiple', ['as' => 'admin.users.destroy_multiple', 'uses' => 'UsersController@destroy_multiple']);
	Route::resource('users', 'UsersController');
	Route::resource('roles', 'RolesController');
});

Route::group(['middleware' => ['api'], 'namespace' => 'Modules\Users\Http\Controllers\Api'], function () {
	Route::group(['prefix' => 'v1'], function () {
		Route::get('users/profile', 'UsersController@userProfile');
		Route::resource('users', 'UsersController');
	});
});