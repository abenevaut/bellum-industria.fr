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
//        Route::get('register', '\CVEPDB\Controllers\Auth\AuthController@getRegister');
//        Route::post('register', '\CVEPDB\Controllers\Auth\AuthController@postRegister');
        // Authentication routes...
        Route::get('login', '\CVEPDB\Controllers\Auth\AuthController@getLogin');
        Route::post('login', '\CVEPDB\Controllers\Auth\AuthController@postLogin');
        Route::get('logout', '\CVEPDB\Controllers\Auth\AuthController@getLogout');
//        // Social Login
//        Route::get('login/{provider?}', ['uses' => '\CVEPDB\Controllers\Auth\AuthController@redirectToProvider']);
//        // Login callbacks
//        Route::get('login/callback/{provider?}', ['uses' => '\CVEPDB\Controllers\Auth\AuthController@handleProviderCallback']);
    });

    Route::group(['prefix' => 'password'], function () {
        // Password reset link request routes...
        Route::get('email', '\CVEPDB\Controllers\Auth\PasswordController@getEmail');
        Route::post('email', '\CVEPDB\Controllers\Auth\PasswordController@postEmail');
        // Password reset routes...
        Route::get('reset/{token}', '\CVEPDB\Controllers\Auth\PasswordController@getReset');
        Route::post('reset', '\CVEPDB\Controllers\Auth\PasswordController@postReset');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        Route::get('/', '\App\CVEPDB\Admin\Controllers\DashboardController@index');
        Route::resource('dashboard', '\App\CVEPDB\Admin\Controllers\DashboardController');

        Route::resource('payments', '\App\CVEPDB\Admin\Controllers\PaymentController');

        Route::resource('contacts', '\App\CVEPDB\Admin\Controllers\ContactController');
        Route::get('contacts/createclient/{id?}', ['as' => 'admin.contacts.create_client', 'uses' => '\App\CVEPDB\Admin\Controllers\ContactController@createClient']);

        Route::resource('roles', '\App\CVEPDB\Admin\Controllers\RoleController');

        Route::resource('users', '\App\CVEPDB\Admin\Controllers\UserController');
        Route::resource('clients', '\App\CVEPDB\Admin\Controllers\ClientController');

        Route::resource('entites', '\App\CVEPDB\Admin\Controllers\EntiteController');
        Route::get('entites/ajax/getvendors', '\App\CVEPDB\Admin\Controllers\EntiteController@postAjaxGetVendorsEntites');
        Route::get('entites/ajax/getclients', '\App\CVEPDB\Admin\Controllers\EntiteController@postAjaxGetClientsEntites');

        Route::resource('bills', '\App\CVEPDB\Admin\Controllers\BillController');
        Route::get('bills/ajax/getbills', '\App\CVEPDB\Admin\Controllers\BillController@postAjaxGetBills');
        Route::get('bills/pdf/{id?}', '\App\CVEPDB\Admin\Controllers\BillController@pdf');

        Route::resource('documents', '\App\CVEPDB\Admin\Controllers\DocumentController');
        Route::post('documents/ajax/postbill/{id?}', ['as' => 'admin.documents.ajaxbill', 'uses' => '\App\CVEPDB\Admin\Controllers\DocumentController@postAjaxDocumentBill']);


        Route::resource('bankaccounts', '\App\CVEPDB\Admin\Controllers\BankAccountController');
        Route::get('bankaccounts/ajax/getbankaccounts', '\App\CVEPDB\Admin\Controllers\BankAccountController@postAjaxGetBankAccount');

    });
});
