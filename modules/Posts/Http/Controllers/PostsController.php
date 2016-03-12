<?php namespace Modules\Posts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class PostsController extends Controller {
	
	public function index()
	{
		return view('posts::index');
	}
	
}