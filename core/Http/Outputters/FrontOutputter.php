<?php namespace Core\Http\Outputters;

use Core\Domain\Settings\Repositories\SettingsRepository;
use CVEPDB\Settings\Facades\Settings;

/**
 * Class FrontOutputter
 * @package Core\Http\Outputters
 */
class FrontOutputter extends CoreOutputter
{

	/**
	 * FrontOutputter constructor.
	 *
	 * @param SettingsRepository $r_settings
	 */
	public function __construct(SettingsRepository $r_settings)
	{
		parent::__construct($r_settings);
		$this->addBreadcrumb('Home', '/');
	}

	/**
	 * @param string $view
	 * @param array  $data
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function output($view, $data = [])
	{
		return parent::output(
			$view,
			$data
		);
	}
}
