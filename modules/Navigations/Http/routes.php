<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Navigations\Http\Controllers\Admin'], function () {
    Route::resource('navigations', 'NavigationController');
});
