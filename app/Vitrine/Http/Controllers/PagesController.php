<?php namespace cms\Vitrine\Http\Controllers;

use cms\Infrastructure\Abstractions\Controllers\FrontendController;
use cms\Vitrine\Repositories\RssRepository;

/**
 * Class PagesController
 * @package cms\Vitrine\Http\Controllers
 */
class PagesController extends FrontendController
{

	/**
	 * @var RssRepository|null
	 */
	protected $r_rss = null;

	/**
	 * PagesController constructor.
	 *
	 * @param RssRepository $r_rss
	 */
	public function __construct(RssRepository $r_rss)
	{
		$this->r_rss = $r_rss;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$this->title = trans('cvepdb/vitrine/index.title');
		$this->description = trans('cvepdb/vitrine/index.intro');

		return view(
			'app/vitrine/index',
			[
				'blog_articles' => $this->r_rss->get_cvepdb_blog_items()
			]
		);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function services()
	{
		$this->title = trans('cvepdb/vitrine/services.title');
		$this->description = trans('cvepdb/vitrine/services.intro');

		return view('app/vitrine/services');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function about()
	{
		$this->title = trans('cvepdb/vitrine/about.title');
		$this->description = trans('cvepdb/vitrine/about.intro');

		return view('app/vitrine/about');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function boutique()
	{
		$this->title = trans('cvepdb/vitrine/boutique.title');
		$this->description = trans('cvepdb/vitrine/boutique.intro');

		return view('app/vitrine/boutique');
	}

}
