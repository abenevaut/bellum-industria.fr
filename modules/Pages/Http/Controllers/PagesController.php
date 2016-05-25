<?php namespace Modules\Pages\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Pages\Repositories\PagesRepositoryEloquent;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	/**
	 * @var PagesRepositoryEloquent|null
	 */
	protected $r_page = null;

	public function __construct(
     PagesRepositoryEloquent $r_page
	) {
	
		$this->r_page = $r_page;
	}

	public function homepage()
	{
		$page = $this->r_page->findWhere(['is_home' => true])->first();

		if (is_null($page)) {
			abort(404);
		}

		$page->addMeta('new_key', ['First Value']);
		$page->addMeta('title', 'Powerfull home title');
		$page->addMeta('description', 'First Value EZ PZ!');

		return cmsview(
      'pages::pages.pages.page',
      [
      'header' => [
      'title' => $page->getMeta('title'),
      'description' => $page->getMeta('description')
      ],
      'page' => [
      'title' => $page->title,
      'content' => $page->content
      ]
      ]
		);
	}

	public function map(Request $request)
	{
		$uri = $request->getRequestUri();
		$uri = trim($uri, '/');

		$page = $this->r_page->findWhere(['uri' => $uri])->first();

		if (is_null($page)) {
			abort(404);
		}

		return cmsview(
      'pages::pages.pages.page',
      [
      'header' => [
      'title' => '',
      'description' => ''
      ],
      'page' => [
      'title' => $page->title,
      'content' => $page->content
      ]
      ]
		);
	}

}
