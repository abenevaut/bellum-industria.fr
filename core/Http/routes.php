<?php

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function ()
{
	Route::resource('settings', '\Core\Http\Controllers\Admin\SettingsController');
});

Route::group(['middleware' => ['ajax'], 'prefix' => 'ajax'], function ()
{
	Route::post('settings/set', '\Core\Http\Controllers\Admin\SettingsController@set');
	Route::get('settings/get', '\Core\Http\Controllers\Admin\SettingsController@get');
});

Route::group(['middleware' => ['api'], 'prefix' => 'api'], function ()
{
	Route::post('v1/settings/set', '\Core\Http\Controllers\Api\SettingsController@set');
	Route::get('v1/settings/get', '\Core\Http\Controllers\Api\SettingsController@get');
});

Route::group(['middleware' => ['web']], function()
{
	Route::get('imageform', function ()
	{
		return View::make('imageform');
	});

	Route::post('imageform', function ()
	{
		$rules = array(
			'image' => 'required|mimes:jpeg,jpg|max:10000'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
		{
			return Redirect::to('imageform')->withErrors($validation);
		}
		else
		{
			$file = Input::file('image');
			$file_name = $file->getClientOriginalName();

			if ($file->move('images', $file_name))
			{
				return Redirect::to('jcrop')
					->with('image', $file_name);
			}
			else
			{
				return "Error uploading file";
			}
		}
	});

	Route::get('jcrop', function (Illuminate\Http\Request $request)
	{
		$data = $request
			->session()
			->all();

//		dd($data);

		return View::make('jcrop')->with('image', 'images/' . $data['image']);
	});

	Route::post('jcrop', function ()
	{
		$quality = 90;

		$src = Input::get('image');
		$img = imagecreatefromjpeg($src);
		$dest = imagecreatetruecolor(Input::get('w'), Input::get('h'));

		imagecopyresampled(
			$dest,
			$img,
			0,
			0,
			Input::get('x'),
			Input::get('y'),
			Input::get('w'),
			Input::get('h'),
			Input::get('w'),
			Input::get('h')
		);

		imagejpeg($dest, $src, $quality);

		return "<img src='" . $src . "'>";
	});
});
