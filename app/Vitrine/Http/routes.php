<?php

Route::group(['middleware' => ['web'], 'domain' => env('CVEPDB_VITRINE_DOMAIN')], function ()
{

	Route::get('/', '\cms\App\Vitrine\Http\Controllers\PageController@index');
	Route::get('about', '\cms\App\Vitrine\Http\Controllers\PageController@about');
	Route::get('services', '\cms\App\Vitrine\Http\Controllers\PageController@services');
	Route::get('boutique', '\cms\App\Vitrine\Http\Controllers\PageController@boutique');

	Route::resource('contact', '\cms\App\Vitrine\Http\Controllers\ContactController');

});
