<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function ()
{
	Route::resource('settings', '\Core\Http\Controllers\Admin\SettingsController');
});

Route::group(['middleware' => ['ajax'], 'prefix' => 'ajax'], function ()
{
	Route::post('settings/set', '\Core\Http\Controllers\Admin\SettingsController@set');
	Route::get('settings/get', '\Core\Http\Controllers\Admin\SettingsController@get');
});

Route::group(['middleware' => ['api'], 'prefix' => 'api'], function ()
{
	Route::post('v1/settings/set', '\Core\Http\Controllers\Api\SettingsController@set');
	Route::get('v1/settings/get', '\Core\Http\Controllers\Api\SettingsController@get');
});
