<?php namespace Core\Http\Outputters\Admin;

use Core\Http\Outputters\AdminOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Core\Domain\Settings\Repositories\LogoSettingsRepository;
use CVEPDB\Abstracts\Http\Requests\FormRequest as AbsFormRequest;

/**
 * Class EnvironmentsOutputter
 * @package Core\Http\Outputters\Admin
 */
class EnvironmentsOutputter extends AdminOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'global.settings';

	/**
	 * @var string Outputter header description
	 */
	protected $description = '';

	/**
	 * @var array|mixed
	 */
	private $form_key_to_settings = [];

	/**
	 * @var LogoSettingsRepository|null
	 */
	private $r_logo_settings = null;

	/**
	 * SettingsOutputter constructor.
	 *
	 * @param SettingsRepository $r_settings
	 */
	public function __construct(
		SettingsRepository $r_settings,
		LogoSettingsRepository $r_logo_settings
	)
	{

		parent::__construct($r_settings);

		$this->r_logo_settings = $r_logo_settings;

		$this->addBreadcrumb(trans('global.settings'), 'admin/environments');
		$this->form_key_to_settings = config('settings.form_key_to_settings');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->output(
			'core.admin.environments.index',
			[
				'settings' => $this->r_settings
			]
		);
	}

	/**
	 * @param AbsFormRequest         $request
	 * @param LogoSettingsRepository $r_logo_settings
	 *
	 * @return mixed|\Redirect
	 */
	public function store(AbsFormRequest $request)
	{
		$posts = $request->all();
		unset($posts['_token']);


		return $this->redirectTo('admin/environments');
	}

	/**
	 * @param $form_key
	 *
	 * @return mixed
	 */
	private function getSettingKey($form_key)
	{
		return $this->form_key_to_settings[$form_key];
	}
}
