<?php

//Route::group(['middleware' => 'web', 'prefix' => 'files', 'namespace' => 'Modules\Files\Http\Controllers'], function()
//{
//	Route::get('/', 'FilesController@index');
//});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Files\Http\Controllers'], function () {
//	Route::resource('files', 'AdminFilesController');

    Route::group(['prefix' => 'files'], function () {
        Route::get('/', ['as' => 'admin.files.index', 'uses' => 'AdminFilesController@index']);
        Route::any('connector', ['as' => 'elfinder.connector', 'uses' => 'AdminFilesController@showConnector']);
        Route::get('tinymce4', ['as' => 'elfinder.tinymce4', 'uses' => 'AdminFilesController@showTinyMCE4']);
        Route::get('popup/{input_id}', ['as' => 'elfinder.popup', 'uses' => 'AdminFilesController@showPopup']);
        Route::get('filepicker/{input_id}', ['as' => 'elfinder.filepicker', 'uses' => 'AdminFilesController@showFilePicker']);
    });
});

Route::get('glide/{path}', function($path){
    $server = \League\Glide\ServerFactory::create([
        'source' => app('filesystem')->disk('thumbnails')->getDriver(),
        'cache' => storage_path('glide'),
    ]);
    return $server->getImageResponse($path, Input::query());
})->where('path', '.+');