<?php namespace Core\Http\Outputters;

use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class FrontOutputter
 * @package Core\Http\Outputters
 */
class FrontOutputter extends CoreOutputter
{

	public function __construct(SettingsRepository $r_settings)
	{
		parent::__construct($r_settings);
		$this->addBreadcrumb('Home', '/');
	}

	public function output($view, $data = [])
	{
		return parent::output($view, $data);
	}
}
