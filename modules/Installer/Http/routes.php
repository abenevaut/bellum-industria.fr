<?php


Route::group(['prefix' => 'installer', 'middleware' => ['installer']], function(){
	Route::get('/', ['as' => 'installer.index', 'uses' => '\Modules\Installer\Http\Controllers\InstallerController@index']);
	Route::post('store', ['as' => 'installer.store', 'uses' => '\Modules\Installer\Http\Controllers\InstallerController@store']);
	Route::get('migration', ['as' => 'installer.migrate', 'uses' => '\Modules\Installer\Http\Controllers\InstallerController@runMigration']);
	Route::get('initialisation', ['as' => 'installer.initialize', 'uses' => '\Modules\Installer\Http\Controllers\InstallerController@initialiseProduction']);
});