<?php namespace Core\Http\Controllers\Api;

use Request;
use Response;
use Core\Http\Controllers\CoreApiController;
use Core\Http\Requests\Admin\SettingsGetFormRequest;
use Core\Http\Requests\Admin\SettingsSetFormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class SettingsController
 * @package Core\Http\Controllers\Api
 */
class SettingsController extends CoreApiController
{

	/**
	 * @var SettingsRepository|null
	 */
	protected $r_settings = null;

	/**
	 * SettingsController constructor.
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
	 *
	 * @return array
	 */
	public function get(SettingsGetFormRequest $request)
	{
		$data = [];

		if (Request::ajax())
		{
			$setting_key = $request->get('setting_key');
			$data[$setting_key] = $this->r_settings->get($setting_key);
		}

		return Response::json($data);
	}

	/**
	 * Ajax method to set settings
	 *
	 * @param SettingsSetFormRequest $request
	 *
	 * @return array
	 */
	public function set(SettingsSetFormRequest $request)
	{
		$data = [];

		if (Request::ajax())
		{
			$setting_key = $request->get('setting_key');
			$setting_value = $request->get('setting_value');
			$this->r_settings->set($setting_key, $setting_value);
			$data[$setting_key] = $setting_value;
		}

		return Response::json($data);
	}
}
