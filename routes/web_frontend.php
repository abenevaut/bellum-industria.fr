<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function ()
{

	/**
	 * Home
	 */

	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

	/**
	 *
	 */

	Route::get('cgu', ['as' => 'cgu', 'uses' => 'AboutController@cgu']);
	Route::get('terms-of-services', ['as' => 'terms', 'uses' => 'AboutController@terms']);

	/**
	 *
	 */

	Route::resource('contact', 'ContactsController');

	/**
	 *
	 */

	Route::resource('documentations', 'DocumentationsController');
	Route::get('documentations{path}', ['as' => 'documentations.file_path', 'uses' => 'DocumentationsController@show'])
		->where('path', '.+');

	/**
	 *
	 */

	Route::resource('medias', 'MediasController');
	Route::get('medias/documents/{path}', ['as' => 'medias.documents.path', 'uses' => 'MediasController@document'])
		->where('path', '.+');
	Route::get('medias/thumbnails/{path}', ['as' => 'medias.documents.path', 'uses' => 'MediasController@thumbnail'])
		->where('path', '.+');

});
