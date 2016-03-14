<?php

//Route::group(['middleware' => 'web', 'prefix' => 'users', 'namespace' => 'Modules\Users\Http\Controllers'], function()
//{
//	Route::get('/', 'UsersController@index');
//});

Route::group(['middleware' => ['web', 'auth'/*, 'role:admin'*/], 'prefix' => 'admin', 'namespace' => 'Modules\Users\Http\Controllers'], function()
{
	Route::resource('users', 'AdminUsersController');
});
