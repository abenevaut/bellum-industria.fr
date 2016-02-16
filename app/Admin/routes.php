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

// Group Admin
Route::group(['domain' => env('DOMAIN_CVEPDB')], function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {


        Route::resource('dashboard', '\App\Admin\Controllers\DashboardController');
        Route::get('/', '\App\Admin\Controllers\DashboardController@index');


        Route::resource('payments', '\App\Admin\Controllers\PaymentController');


        Route::resource('contacts', '\App\Admin\Controllers\ContactController');
        Route::get('contacts/createclient/{id?}', ['as' => 'admin.contacts.create_client', 'uses' => '\App\Admin\Controllers\ContactController@createClient']);


        Route::resource('roles', '\App\Admin\Controllers\RoleController');


        Route::resource('permissions', '\App\Admin\Controllers\PermissionController');
        Route::get('permissions/ajax/getpermissions', '\App\Admin\Controllers\PermissionController@postAjaxGetPermissions');

        Route::resource('users', '\App\Admin\Controllers\UserController');


        Route::resource('projects', '\App\Admin\Controllers\ProjectController');


        Route::resource('entites', '\App\Admin\Controllers\EntiteController');
        Route::get('entites/ajax/getvendors', '\App\Admin\Controllers\EntiteController@postAjaxGetVendorsEntites');
        Route::get('entites/ajax/getclients', '\App\Admin\Controllers\EntiteController@postAjaxGetClientsEntites');


        Route::resource('bills', '\App\Admin\Controllers\BillController');
        Route::get('bills/ajax/getbills', '\App\Admin\Controllers\BillController@postAjaxGetBills');
        Route::get('bills/pdf/{id?}', '\App\Admin\Controllers\BillController@pdf');


        Route::resource('documents', '\App\Admin\Controllers\DocumentController');
        Route::post('documents/ajax/postbill/{id?}', ['as' => 'admin.documents.ajaxbill', 'uses' => '\App\Admin\Controllers\DocumentController@postAjaxDocumentBill']);


        Route::resource('bankaccounts', '\App\Admin\Controllers\BankAccountController');
        Route::get('bankaccounts/ajax/getbankaccounts', '\App\Admin\Controllers\BankAccountController@postAjaxGetBankAccount');


    });
});
