<?php

//Route::group(['middleware' => 'web', 'prefix' => 'dashboard', 'namespace' => 'Modules\Dashboard\Http\Controllers'], function()
//{
//	Route::get('/', 'DashboardController@index');
//});

Route::group(['middleware' => ['web', 'CMSInstalled', 'auth', 'role:admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Dashboard\Http\Controllers'], function()
{
	Route::get('/', 'AdminDashboardController@index');
	Route::resource('dashboard', 'AdminDashboardController');
});
