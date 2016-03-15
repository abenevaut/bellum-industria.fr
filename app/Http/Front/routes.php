<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web', 'CMSInstalled']], function () {

    Route::get('/', function () {
        return view('front.welcome');
    });

    Route::get('/home', '\App\Http\Front\Controllers\HomeController@index');
});

Route::group(['prefix' => 'installer', 'middleware' => ['web', 'CMSAllowInstallation']], function(){
    Route::get('/', ['as' => 'installer.index', 'uses' => '\App\Http\Front\Controllers\InstallerController@index']);
    Route::post('store', ['as' => 'installer.store', 'uses' => '\App\Http\Front\Controllers\InstallerController@store']);
    Route::get('migration', ['as' => 'installer.migrate', 'uses' => '\App\Http\Front\Controllers\InstallerController@runMigration']);
    Route::get('initialisation', ['as' => 'installer.initialize', 'uses' => '\App\Http\Front\Controllers\InstallerController@initialiseProduction']);
});