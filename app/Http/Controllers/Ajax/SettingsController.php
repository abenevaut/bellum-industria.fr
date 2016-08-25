<?php namespace cms\Http\Controllers\Ajax;

use cms\Infrastructure\Abstractions\Controllers\AjaxController;
use cms\Http\Requests\Backend\SettingsGetFormRequest;
use cms\Http\Requests\Backend\SettingsSetFormRequest;
use cms\Domain\Settings\Settings\Repositories\SettingsRepository;

/**
 * Class SettingsController
 * @package cms\Http\Controllers\Ajax
 */
class SettingsController extends AjaxController
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
