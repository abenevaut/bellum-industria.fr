<?php

Route::group(
    [
        'middleware' => [
            'admin'
        ],
        'prefix' => 'admin',
        'namespace' => 'Modules\Dashboard\Http\Controllers\Admin'
    ],
    function () {
        Route::get('/', 'DashboardController@index');
        Route::get('dashboard/settings', 'DashboardController@settings');
        Route::resource('dashboard', 'DashboardController');
    }
);
