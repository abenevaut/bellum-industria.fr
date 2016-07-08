<?php namespace App\Vitrine\Http\Outputters;

use App\Admin\Repositories\Posts\RssRepository;
use Core\Http\Outputters\FrontOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class ContactOutputter
 * @package App\Vitrine\Http\Outputters
 */
class ContactOutputter extends FrontOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'Contact';

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

		$this->addBreadcrumb(trans('global.contact'), 'contact');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->output('app/vitrine/contact');
	}

}
