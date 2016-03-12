<?php namespace Modules\Files\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class FilesController extends Controller {
	
	public function index()
	{
		return view('files::index');
	}
	
}