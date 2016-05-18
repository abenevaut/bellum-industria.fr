<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\ClashOfClan\Http\Controllers\Admin'], function () {
    Route::resource('clashofclan/settings', 'SettingsController');
});
