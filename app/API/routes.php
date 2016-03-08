<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Group API
Route::group(['domain' => env('DOMAIN_API'), 'middleware' => ['APIResponseHeaderJsCVEPDBMiddleware']], function () {

    Route::group(['prefix' => 'v1'], function () {

        Route::get('users/profile', '\App\Api\Controllers\UserController@userProfile');
        Route::resource('users', '\App\Api\Controllers\UserController');

        Route::get('dates/french_hollidays', '\App\Api\Controllers\DateController@french_hollidays');
        Route::get('dates/french_hollidays/{year}', '\App\Api\Controllers\DateController@french_hollidays');

        Route::get('maps/geolocalisation/{longitude}/{latitude}', '\App\Api\Controllers\MapController@geolocalisation');
        Route::get('maps/address/{address}', '\App\Api\Controllers\MapController@address');

        Route::get('csgolounge/stats', '\App\Api\Controllers\CSGOLoungeStatisticsController@get_csgoloung_matches_stats');

    });
});