<?php

Route::group(['middleware' => ['web'], 'prefix' => 'steam', 'namespace' => 'Modules\Steam\Http\Controllers'], function () {
    Route::get('login', ['as' => 'steam.login', 'uses' => 'AuthController@login']);
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Steam\Http\Controllers\Admin'], function () {
    Route::resource('steam/settings', 'SettingsController');
});
