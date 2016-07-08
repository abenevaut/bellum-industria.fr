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

Route::group(['domain' => env('CVEPDB_MULTIGAMING_DOMAIN')], function ()
{

	Route::resource('index', '\App\Multigaming\Http\Controllers\IndexController');
	Route::get('/', '\App\Multigaming\Http\Controllers\IndexController@index');
	Route::get('boutique', '\App\Multigaming\Http\Controllers\IndexController@boutique');
	Route::get('challenge', '\App\Multigaming\Http\Controllers\IndexController@challenge');
	Route::get('message-of-the-day', '\App\Multigaming\Http\Controllers\IndexController@messageoftheday');
	Route::get('ranks', '\App\Multigaming\Http\Controllers\IndexController@ranks');

	Route::resource('teams', '\App\Multigaming\Http\Controllers\TeamController');

	/*
	 * Auth
	 */

	Route::group(['prefix' => 'auth'], function ()
	{
		Route::get('login', '\App\Multigaming\Http\Controllers\AuthController@login');
		// Route::get('login_battlenet', '\App\Multigaming\Http\Controllers\AuthController@login_battlenet');
		Route::get('logout', '\App\Multigaming\Http\Controllers\AuthController@logout');
	});

	/*
	 * Sitemaps
	 */

	Route::get('sitemap.xml', '\App\Multigaming\Http\Controllers\IndexController@sitemap');
	Route::get('sitemap-multigaming-teams.xml', ['as' => 'teams.sitemap', 'uses' => '\App\Multigaming\Http\Controllers\TeamController@sitemap']);
	Route::get('sitemap-multigaming-coc.xml', ['as' => 'coc.sitemap', 'uses' => '\App\Multigaming\Http\Controllers\TeamController@sitemapcoc']);

});
