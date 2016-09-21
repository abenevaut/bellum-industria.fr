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

Route::group(['middleware' => ['web'], 'domain' => env('CVEPDB_MULTIGAMING_DOMAIN')], function ()
{

	Route::get('/', ['as' => 'home', 'uses' => '\cms\Multigaming\Http\Controllers\IndexController@index']);
	Route::get('boutique', '\cms\Multigaming\Http\Controllers\IndexController@boutique');
	Route::get('challenge', '\cms\Multigaming\Http\Controllers\IndexController@challenge');
	Route::get('message-of-the-day', '\cms\Multigaming\Http\Controllers\IndexController@messageoftheday');
	Route::get('ranks', '\cms\Multigaming\Http\Controllers\IndexController@ranks');
//	Route::get('announcements', '\cms\Multigaming\Http\Controllers\IndexController@announcements');

	Route::resource('mcontact', '\cms\Multigaming\Http\Controllers\ContactController');

	/*
	 * Auth
	 */

//	Route::group(['prefix' => 'auth'], function ()
//	{
//		Route::get('login', '\cms\Multigaming\Http\Controllers\AuthController@login');
//		// Route::get('login_battlenet', '\App\Multigaming\Http\Controllers\AuthController@login_battlenet');
//		Route::get('logout', '\cms\Multigaming\Http\Controllers\AuthController@logout');
//	});

	/*
	 * Sitemaps
	 */

	Route::get('sitemap.xml', '\cms\Multigaming\Http\Controllers\IndexController@sitemap');
	Route::get('sitemap-multigaming-teams.xml', ['as' => 'teams.sitemap', 'uses' => '\cms\Multigaming\Http\Controllers\TeamController@sitemap']);
	Route::get('sitemap-multigaming-coc.xml', ['as' => 'coc.sitemap', 'uses' => '\cms\Multigaming\Http\Controllers\TeamController@sitemapcoc']);

});
