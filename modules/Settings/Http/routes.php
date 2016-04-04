<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Settings\Http\Controllers'], function () {
    Route::resource('settings', 'AdminSettingsController');
});