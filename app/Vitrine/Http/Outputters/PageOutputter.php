<?php namespace App\Vitrine\Http\Outputters;

use App\Admin\Repositories\Posts\RssRepository;
use Core\Http\Outputters\FrontOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class PageOutputter
 * @package App\Http\Outputters
 */
class PageOutputter extends FrontOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'global.pages';

	/**
	 * @var string Outputter header description
	 */
	protected $description = '';

	/**
	 * @var RssRepository|null
	 */
	private $r_rss = null;

	/**
	 * SettingsOutputter constructor.
	 *
	 * @param SettingsRepository $r_settings
	 */
	public function __construct(
		SettingsRepository $r_settings,
		RssRepository $r_rss
	)
	{
		parent::__construct($r_settings);

		$this->r_rss = $r_rss;

		$this->addBreadcrumb(trans('global.pages'), 'pages');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->output('app/vitrine/index', [
			'blog_articles' => $this->r_rss->get_cvepdb_blog_items()
		]);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function services()
	{
		return $this->output('app/vitrine/services');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function about()
	{
		return $this->output('app/vitrine/about');
	}
}
