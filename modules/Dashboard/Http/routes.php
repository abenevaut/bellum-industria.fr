<?php

//Route::group(['middleware' => 'web', 'prefix' => 'dashboard', 'namespace' => 'Modules\Dashboard\Http\Controllers'], function()
//{
//	Route::get('/', 'DashboardController@index');
//});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Dashboard\Http\Controllers'], function()
{
	Route::get('/', 'AdminDashboardController@index');
	Route::get('dashboard/config', 'AdminDashboardController@config');
	Route::resource('dashboard', 'AdminDashboardController');
});
