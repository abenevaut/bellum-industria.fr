<?php

Route::group(['middleware' => ['web'], 'namespace' => 'Modules\Pages\Http\Controllers'], function () {

	Route::get('/', 'PagesController@homepage');

//	$not_using_private_route = true;
//
//	foreach (Module::all() as $module) {
//		$not_using_private_route = $not_using_private_route
//			&& !Request::is($module->name)
//			&& !Request::is($module->name . '/*');
//	}
//
//	foreach (explode('|', 'vendor|admin|themes|assets|modules|uploads|_debugbar|login|register|password|logout') as $private_base_uri) {
//		$not_using_private_route = $not_using_private_route
//			&& !Request::is($private_base_uri)
//			&& !Request::is($private_base_uri . '/*');
//	}
//
//	if ($not_using_private_route)
//	{
//		Route::get('{uri}', 'PagesController@map')
//			->where('uri', '^([A-z\d-\/_.]+)?'); // config('pages.route_pattern') // xABE todo check PagesServiceProvider
//	}
});

//App::after(function($request, $response) {
//	/**
//	 * This route is registered as last route
//	 */
//	Route::group(['middleware' => 'web', 'namespace' => 'Modules\Pages\Http\Controllers'], function() {
//		Route::any('(.*)', 'PagesController@index');
//	});
//});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Pages\Http\Controllers\Admin'], function () {
	Route::resource('pages', 'PagesController');
});
