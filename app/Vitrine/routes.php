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

Route::group(['domain' => env('DOMAIN_CVEPDB')], function () {

    Route::resource('index', '\App\Vitrine\Controllers\IndexController');
    Route::get('/', '\App\Vitrine\Controllers\IndexController@index');
    Route::get('home', '\App\Vitrine\Controllers\IndexController@index');

    Route::resource('about', '\App\Vitrine\Controllers\AboutController');
    Route::resource('services', '\App\Vitrine\Controllers\ServiceController');
    Route::resource('boutique', '\App\Vitrine\Controllers\BoutiqueController');
    Route::resource('contact', '\App\Vitrine\Controllers\ContactController');

    //    Todo mettre en place le sitemap
    //    Route::get('sitemap', '\App\CVEPDB\Vitrine\Controllers\IndexController@sitemap');

});
