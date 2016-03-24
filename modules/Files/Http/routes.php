<?php

//Route::group(['middleware' => 'web', 'prefix' => 'files', 'namespace' => 'Modules\Files\Http\Controllers'], function()
//{
//	Route::get('/', 'FilesController@index');
//});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Files\Http\Controllers'], function()
{
	Route::resource('files', 'AdminFilesController');
});