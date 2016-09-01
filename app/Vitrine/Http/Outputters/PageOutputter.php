<?php namespace cms\App\Vitrine\Http\Outputters;

use cms\App\Admin\Repositories\Posts\RssRepository;
use Core\Http\Outputters\FrontOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class PageOutputter
 * @package App\Vitrine\Http\Outputters
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
		$this->title = trans('cvepdb/vitrine/index.title');
		$this->description = trans('cvepdb/vitrine/index.intro');

		return $this->output('app/vitrine/index', [
			'blog_articles' => $this->r_rss->get_cvepdb_blog_items()
		]);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function services()
	{
		$this->title = trans('cvepdb/vitrine/services.title');
		$this->description = trans('cvepdb/vitrine/services.intro');

		return $this->output('app/vitrine/services');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function about()
	{
		$this->title = trans('cvepdb/vitrine/about.title');
		$this->description = trans('cvepdb/vitrine/about.intro');

		return $this->output('app/vitrine/about');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function boutique()
	{
		$this->title = trans('cvepdb/vitrine/boutique.title');
		$this->description = trans('cvepdb/vitrine/boutique.intro');

		return $this->output('app/vitrine/boutique');
	}

}
