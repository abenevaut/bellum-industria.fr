<?php namespace Modules\Users\Http\Outputters\Admin;

use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Core\Domain\Dashboard\Repositories\SettingsRepository;
use Core\Domain\Dashboard\Repositories\SettingsRepository as DashboardSettingsRepository;

/**
 * Class SettingsOutputter
 * @package Modules\Users\Http\Outputters\Admin
 */
class SettingsOutputter extends AdminOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'users::admin.meta_title';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'users::admin.meta_description';

	/**
	 * @var DashboardSettingsRepository|null
	 */
	protected $r_dashboard = null;

	/**
	 * SettingsOutputter constructor.
	 *
	 * @param DashboardSettingsRepository $_settings
	 * @param DashboardSettingsRepository $r_dashboard
	 */
	public function __construct(
		SettingsRepository $_settings,
		DashboardSettingsRepository $r_dashboard
	)
	{

		parent::__construct($_settings);

		$this->r_dashboard = $r_dashboard;

		$this->set_current_module('users');
		$this->addBreadcrumb('Settings', 'admin/users');
		$this->r_dashboard->setSettingKey('users.dashboard.widgets');
		$this->r_dashboard->setModuleSettingKey('.front.users.dashboard.widgets');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$this->r_dashboard->checkWidgetsList();

		$social_login = $this->r_settings->get('users.social.login');
		$is_registration_allowed = $this->r_settings->get('users.is_registration_allowed');
		$widgets = $this->r_dashboard->allWidgets();

		return $this->output(
			'users.admin.settings.index',
			[
				'social_login'            => $social_login,
				'is_registration_allowed' => $is_registration_allowed,
				'widgets'                 => $widgets
			]
		);
	}

	/**
	 * @param IFormRequest $request
	 *
	 * @return array
	 */
	public function store(IFormRequest $request)
	{
		$is_registration_allowed = $request->get('is_registration_allowed');
		$this->r_settings->set('users.is_registration_allowed', !is_null($is_registration_allowed));

		$social_login = $request->get('social_login');
		$this->r_settings->set('users.social.login', is_array($social_login) ? $social_login : []);

		$widgets = $request->get('widgets');
		$this->r_dashboard->activate($widgets);

		return $this->redirectTo('admin/users/settings');
	}
}
