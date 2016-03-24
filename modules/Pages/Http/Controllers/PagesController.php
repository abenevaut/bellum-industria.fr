<?php namespace Modules\Pages\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class PagesController extends Controller {

	public function homepage()
	{
		return cmsview('index', ['header' => ['title' => '', 'description' => '']]);
	}

	public function map($page)
	{

		dd($page);


		return cmsview('index', ['header' => ['title' => '', 'description' => '']]);
	}

}