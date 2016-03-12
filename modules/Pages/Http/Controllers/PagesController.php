<?php namespace Modules\Pages\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class PagesController extends Controller {
	
	public function index()
	{
		return view('pages::index');
	}
	
}