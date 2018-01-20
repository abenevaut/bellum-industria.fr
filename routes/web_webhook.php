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

/**
 * Webhook routes.
 */
Route::group(['namespace' => 'Webhook', 'prefix' => 'webhook'], function ()
{
	Route::group(['prefix' => 'facebook'], function () {
		Route::group(['prefix' => 'v2.11'], function () {
			Route::post('cancel-subscription-to-app', 'FacebookController@cancelSubscriptionToApp');
		});
	});
});
