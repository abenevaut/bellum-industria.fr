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

	Route::get('/', ['as' => 'home', 'uses' => 'IndexController@index']);
	Route::get('boutique', 'IndexController@boutique');
	Route::get('challenge', 'IndexController@challenge');
	Route::get('message-of-the-day', 'IndexController@messageoftheday');
	Route::get('ranks', 'IndexController@ranks');
//	Route::get('announcements', 'IndexController@announcements');

	Route::resource('contact', 'ContactController');

	/*
	 * Auth
	 */

//	Route::group(['prefix' => 'auth'], function ()
//	{
//		Route::get('login', 'AuthController@login');
//		// Route::get('login_battlenet', '\App\Multigaming\Http\Controllers\AuthController@login_battlenet');
//		Route::get('logout', 'AuthController@logout');
//	});

	/*
	 * Sitemaps
	 */

	Route::get('sitemap.xml', 'IndexController@sitemap');
	Route::get('sitemap-multigaming-teams.xml', ['as' => 'teams.sitemap', 'uses' => 'TeamController@sitemap']);
	Route::get('sitemap-multigaming-coc.xml', ['as' => 'coc.sitemap', 'uses' => 'TeamController@sitemapcoc']);

});
