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

// Group Vitrine
Route::group(['domain' => env('DOMAIN_CVEPDB')], function () {
    Route::get('/', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('home', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::resource('index', '\App\CVEPDB\Vitrine\Controllers\IndexController');
    Route::resource('about', '\App\CVEPDB\Vitrine\Controllers\AboutController');
    Route::resource('services', '\App\CVEPDB\Vitrine\Controllers\ServiceController');
    Route::resource('boutique', '\App\CVEPDB\Vitrine\Controllers\BoutiqueController');
    Route::resource('contact', '\App\CVEPDB\Vitrine\Controllers\ContactController');
});
