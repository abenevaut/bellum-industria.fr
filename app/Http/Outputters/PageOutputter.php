<?php namespace App\Http\Outputters;

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
	 * @var array|mixed
	 */
	private $form_key_to_settings = [];

	/**
	 * SettingsOutputter constructor.
	 *
	 * @param SettingsRepository $r_settings
	 */
	public function __construct(
		SettingsRepository $r_settings
	)
	{
		parent::__construct($r_settings);

		$this->addBreadcrumb(trans('global.pages'), 'pages');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->output('app/vitrine/index');
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
