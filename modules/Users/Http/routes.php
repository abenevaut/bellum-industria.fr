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
	Route::group(['prefix' => 'password', 'namespace' => 'Modules\Users\Http\Controllers\Auth'], function () {
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
	Route::get('login', 'AuthAdminController@getLogin');
	Route::post('login', 'AuthAdminController@postLogin');
	Route::get('logout', 'AuthAdminController@getLogout');
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Users\Http\Controllers'], function() {
	Route::get('users/impersonate/{id}', ['as' => 'admin.users.impersonate', 'uses' => 'AdminUsersController@impersonate']);
	Route::get('users/endimpersonate', ['as' => 'admin.users.endimpersonate', 'uses' => 'AdminUsersController@endimpersonate']);
	Route::get('users/export', ['as' => 'admin.users.export', 'uses' => 'AdminUsersController@export']);
	Route::delete('users/destroy_multiple', ['as' => 'admin.users.destroy_multiple', 'uses' => 'AdminUsersController@destroy_multiple']);
	Route::resource('users', 'AdminUsersController');
	Route::resource('roles', 'AdminRolesController');
});
