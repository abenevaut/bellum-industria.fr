<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Teamspeak\Http\Controllers\Admin'], function () {
    Route::resource('teamspeak', 'TeamspeakController');
});
