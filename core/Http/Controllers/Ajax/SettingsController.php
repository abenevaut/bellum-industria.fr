<?php namespace Core\Http\Controllers\Admin;

use Core\Http\Controllers\CoreAjaxController;
use Core\Http\Requests\Admin\SettingsGetFormRequest;
use Core\Http\Requests\Admin\SettingsSetFormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class SettingsController
 * @package Core\Http\Controllers\Admin
 */
class SettingsController extends CoreAjaxController
{

	/**
	 * @var SettingsRepository|null
	 */
	protected $r_settings = null;

	/**
	 * SettingsController constructor.
	 *
	 * @param SettingsRepository $r_settings
	 */
	public function __construct(SettingsRepository $r_settings)
	{
		parent::__construct();
		$this->r_settings = $r_settings;
	}

	/**
	 * Ajax method to get settings
	 *
	 * @param SettingsGetFormRequest $request
	 * @return array
	 */
	public function get(SettingsGetFormRequest $request)
	{
		$this->_before();

		$setting_key = $request->get('setting_key');

		$data = [];
		$data[$setting_key] = $this->r_settings->get($setting_key);

		return $this->_after($data);
	}

	/**
	 * Ajax method to set settings
	 *
	 * @param SettingsSetFormRequest $request
	 * @return array
	 */
	public function set(SettingsSetFormRequest $request)
	{
		$this->_before();

		$setting_key = $request->get('setting_key');
		$setting_value = $request->get('setting_value');

		$this->r_settings->set($setting_key, $setting_value);

		return $this->_after([$setting_key => $setting_value]);
	}
}
