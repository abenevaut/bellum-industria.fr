<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Dashboard\Http\Controllers\Admin'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('dashboard', 'DashboardController');
});
