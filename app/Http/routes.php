<?php

Route::group(['middleware' => ['web']], function ()
{
	Route::get('/', '\App\Http\Controllers\PageController@index');
	Route::get('about', '\App\Http\Controllers\PageController@about');
	Route::get('services', '\App\Http\Controllers\PageController@services');
});
