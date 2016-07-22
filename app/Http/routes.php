<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => [/*'admin'*/], 'prefix' => 'admin'], function ()
{
	Route::resource('settings', '\cms\Http\Controllers\Backend\SettingsController');
	Route::resource('environments', '\cms\Http\Controllers\Backend\EnvironmentsController');
});

Route::group(['middleware' => ['ajax'], 'prefix' => 'ajax'], function ()
{
	Route::post('settings/set', '\cms\Http\Controllers\Ajax\SettingsController@set');
	Route::get('settings/get', '\cms\Http\Controllers\Ajax\SettingsController@get');
});

Route::group(['middleware' => ['api'], 'prefix' => 'api'], function ()
{
	Route::post('v1/settings/set', '\cms\Http\Controllers\Api\SettingsController@set');
	Route::get('v1/settings/get', '\cms\Http\Controllers\Api\SettingsController@get');

	Route::get('v1/dates/french_hollidays', '\cms\Http\Controllers\Api\DateController@french_hollidays');

	Route::get('v1/maps/geolocalisation/{latitude}/{longitude}', '\cms\Http\Controllers\Api\MapController@geolocalisation');
	Route::get('v1/maps/address/{address}', '\cms\Http\Controllers\Api\MapController@address');
});
