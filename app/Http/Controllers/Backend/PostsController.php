<?php namespace bellumindustria\Http\Controllers\Backend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Posts\Posts\Repositories\PostsRepositoryEloquent;

class PostsController extends ControllerAbstract
{

	/**
	 * @var PostsRepositoryEloquent|null
	 */
	protected $r_posts = null;

	/**
	 * FilesController constructor.
	 *
	 * @param PostsRepositoryEloquent $r_posts
	 */
	public function __construct(PostsRepositoryEloquent $r_posts)
	{
		$this->r_posts = $r_posts;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_posts->backendIndexView();
	}
}
