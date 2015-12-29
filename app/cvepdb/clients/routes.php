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

// Group Clients
Route::group(['prefix' => 'clients'], function () {

    Route::get('users', '\App\CVEPDB\Clients\Controllers\UsersController@index');

});
