<?php namespace Modules\Pages\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class PagesController extends Controller {
	
	public function index()
	{
		return cmsview('pages::index', ['header' => ['title' => '', 'description' => '']]);
	}

}