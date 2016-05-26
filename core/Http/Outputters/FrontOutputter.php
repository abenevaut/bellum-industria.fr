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
	 * @var bool true to allow users login from social networks
	 */
	protected $cfg_users_social_login = false;

	/**
	 * @var bool true to allow users registration
	 */
	protected $cfg_users_is_registration_allowed = false;

	/**
	 * FrontOutputter constructor.
	 *
	 * @param SettingsRepository $r_settings
	 */
	public function __construct(SettingsRepository $r_settings)
	{
		parent::__construct($r_settings);
		$this->addBreadcrumb('Home', '/');

		$this->cfg_users_social_login = Settings::get('users.social.login');
		$this->cfg_users_is_registration_allowed = Settings::get('users.is_registration_allowed');
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
			+ [
				'social_login'            => $this->cfg_users_social_login,
				'is_registration_allowed' => $this->cfg_users_is_registration_allowed,
			]
		);
	}
}
