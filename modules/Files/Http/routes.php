<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Files\Http\Controllers\Admin'], function () {
    Route::group(['prefix' => 'files'], function () {
        Route::get('/', ['as' => 'admin.files.index', 'uses' => 'FilesController@index']);
        Route::any('connector', ['as' => 'elfinder.connector', 'uses' => 'FilesController@showConnector']);
        Route::get('tinymce4', ['as' => 'elfinder.tinymce4', 'uses' => 'FilesController@showTinyMCE4']);
        Route::get('popup/{input_id}', ['as' => 'elfinder.popup', 'uses' => 'FilesController@showPopup']);
        Route::get('filepicker/{input_id}', ['as' => 'elfinder.filepicker', 'uses' => 'FilesController@showFilePicker']);
    });
});

Route::get('glide/{path}', function($path){
    $server = \League\Glide\ServerFactory::create([
        'source' => app('filesystem')->disk('thumbnails')->getDriver(),
        'cache' => storage_path('glide'),
    ]);
    return $server->getImageResponse($path, Input::query());
})->where('path', '.+');
