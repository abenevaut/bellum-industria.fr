<?php

Route::group(['middleware' => ['web'], 'domain' => env('CVEPDB_VITRINE_DOMAIN')], function ()
{

	Route::get('/', '\App\Vitrine\Http\Controllers\PageController@index');
	Route::get('about', '\App\Vitrine\Http\Controllers\PageController@about');
	Route::get('services', '\App\Vitrine\Http\Controllers\PageController@services');
	Route::get('boutique', '\App\Vitrine\Http\Controllers\PageController@boutique');

	Route::resource('contact', '\App\Vitrine\Http\Controllers\ContactController');

});
