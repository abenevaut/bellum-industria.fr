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

// Group Vitrine
Route::group(['domain' => env('DOMAIN_CVEPDB')], function () {
    // Authentication routes...
    Route::group(['prefix' => 'auth'], function () {
        // Registration routes...
        Route::get('register', '\App\Http\Controllers\Auth\AuthController@getRegister');
        Route::post('register', '\App\Http\Controllers\Auth\AuthController@postRegister');
        // Authentication routes...
        Route::get('login', '\App\Http\Controllers\Auth\AuthController@getLogin');
        Route::post('login', '\App\Http\Controllers\Auth\AuthController@postLogin');
        Route::get('logout', '\App\Http\Controllers\Auth\AuthController@getLogout');
        // Social Login
        Route::get('login/{provider?}', ['uses' => '\App\Http\Controllers\Auth\AuthController@redirectToProvider']);
        // Login callbacks
        Route::get('login/callback/{provider?}', ['uses' => '\App\Http\Controllers\Auth\AuthController@handleProviderCallback']);
    });

    Route::group(['prefix' => 'password'], function () {
        // Password reset link request routes...
        Route::get('email', '\App\Http\Controllers\Auth\PasswordController@getEmail');
        Route::post('email', '\App\Http\Controllers\Auth\PasswordController@postEmail');
        // Password reset routes...
        Route::get('reset/{token}', '\App\Http\Controllers\Auth\PasswordController@getReset');
        Route::post('reset', '\App\Http\Controllers\Auth\PasswordController@postReset');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        Route::get('/', '\App\CVEPDB\Admin\Controllers\DashboardController@index');
        Route::get('dashboard', '\App\CVEPDB\Admin\Controllers\DashboardController@index');

        Route::resource('payments', '\App\CVEPDB\Admin\Controllers\PaymentController');

        Route::resource('contacts', '\App\CVEPDB\Admin\Controllers\ContactController');

        Route::resource('roles', '\App\CVEPDB\Admin\Controllers\RoleController');

        Route::resource('users', '\App\CVEPDB\Admin\Controllers\UserController');

        Route::resource('entites', '\App\CVEPDB\Admin\Controllers\EntiteController');
        Route::get('entites/ajax/getvendors', '\App\CVEPDB\Admin\Controllers\EntiteController@postAjaxGetVendorsEntites');
        Route::get('entites/ajax/getclients', '\App\CVEPDB\Admin\Controllers\EntiteController@postAjaxGetClientsEntites');

        Route::resource('bills', '\App\CVEPDB\Admin\Controllers\BillController');
        Route::get('bills/ajax/getbills', '\App\CVEPDB\Admin\Controllers\BillController@postAjaxGetBills');

        Route::resource('bankaccounts', '\App\CVEPDB\Admin\Controllers\BankAccountController');
        Route::get('bankaccounts/ajax/getbankaccounts', '\App\CVEPDB\Admin\Controllers\BankAccountController@postAjaxGetBankAccount');

    });
});
