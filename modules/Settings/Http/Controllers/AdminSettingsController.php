<?php namespace Modules\Settings\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class AdminSettingsController extends Controller {
	
	public function index()
	{
		return view('settings::index');
	}
	
}