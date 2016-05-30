<?php

Route::group(['middleware' => 'web', 'prefix' => 'posts', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
	Route::get('/', 'PostsController@index');
});

Route::group(['middleware' => ['web', 'CMSInstalled', 'auth', 'role:admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
	Route::resource('posts', 'PostsAdminController');
});