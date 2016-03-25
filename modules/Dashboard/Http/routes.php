<?php

//Route::group(['middleware' => 'web', 'prefix' => 'dashboard', 'namespace' => 'Modules\Dashboard\Http\Controllers'], function()
//{
//	Route::get('/', 'DashboardController@index');
//});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Dashboard\Http\Controllers'], function()
{
	Route::get('/', 'AdminDashboardController@index');
	Route::get('dashboard/settings', 'AdminDashboardController@settings');
	Route::resource('dashboard', 'AdminDashboardController');
});
