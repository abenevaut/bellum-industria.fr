<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function ()
{
	Route::resource('settings', '\Core\Http\Controllers\Admin\SettingsController');
});

Route::group(['middleware' => ['throttle:60,1', 'APIResponseHeaderJsMiddleware']], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
		Route::post('settings/set', '\Core\Http\Controllers\Api\SettingsController@set');
		Route::post('settings/get', '\Core\Http\Controllers\Api\SettingsController@get');
	});
});
