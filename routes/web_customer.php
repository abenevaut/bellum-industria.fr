<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
	[
		'as' => 'gamer.',
		'namespace' => 'Customer',
		'prefix' => 'gamer',
		'middleware' => ['auth', 'role:'.\bellumindustria\Domain\Users\Users\User::ROLE_GAMER],
	], function () {

	/**
	 *
	 */

	Route::resource('dashboard', 'DashboardController');

});
