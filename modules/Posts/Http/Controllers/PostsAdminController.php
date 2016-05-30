<?php namespace Modules\Posts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class PostsAdminController extends Controller {

    public function index()
    {
        return cmsview('posts::index', ['header' => ['title' => '', 'description' => '']]);
    }

}