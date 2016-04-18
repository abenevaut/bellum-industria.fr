<?php

Route::group(['middleware' => ['throttle:60,1', 'APIResponseHeaderJsMiddleware']], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::get('settings/set', '\Core\Http\Controllers\Admin\SettingsController@set');
        Route::get('settings/get', '\Core\Http\Controllers\Admin\SettingsController@get');
    });
});
