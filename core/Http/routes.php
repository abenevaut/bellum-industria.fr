<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function ()
{
	Route::resource('settings', '\Core\Http\Controllers\Admin\SettingsController');
});

Route::group(['middleware' => ['ajax'], 'prefix' => 'ajax/v1'], function ()
{
	Route::post('settings/set', '\Core\Http\Controllers\Admin\SettingsController@set');
	Route::post('settings/get', '\Core\Http\Controllers\Admin\SettingsController@get');
});

Route::group(['middleware' => ['api'], 'prefix' => 'api/v1'], function ()
{
	Route::post('settings/set', '\Core\Http\Controllers\Api\SettingsController@set');
	Route::post('settings/get', '\Core\Http\Controllers\Api\SettingsController@get');
});
