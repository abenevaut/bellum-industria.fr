<?php

Route::group(['middleware' => ['web'], 'domain' => env('CVEPDB_VITRINE_DOMAIN')], function ()
{

	Route::get('/', ['as' => 'home', 'uses' => '\cms\Vitrine\Http\Controllers\PagesController@index']);
	Route::get('about', '\cms\Vitrine\Http\Controllers\PagesController@about');
	Route::get('services', '\cms\Vitrine\Http\Controllers\PagesController@services');
	Route::get('boutique', '\cms\Vitrine\Http\Controllers\PagesController@boutique');

	Route::resource('contact', ['as' => 'vitrine.contact', 'uses' => '\cms\Vitrine\Http\Controllers\ContactController']);

});
