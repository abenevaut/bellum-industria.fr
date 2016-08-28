<?php namespace cms\Http\Controllers\Api;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use cms\Infrastructure\Abstractions\Controllers\ApiController;

use cms\Http\Requests\Admin\SettingsGetFormRequest;
use cms\Http\Requests\Admin\SettingsSetFormRequest;

use cms\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class SettingsController
 * @package cms\Http\Controllers\Api
 */
class SettingsController extends ApiController
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

		$setting_key = $request->get('setting_key');
		$data[$setting_key] = $this->r_settings->get($setting_key);

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

		$setting_key = $request->get('setting_key');
		$setting_value = $request->get('setting_value');
		$this->r_settings->set($setting_key, $setting_value);
		$data[$setting_key] = $setting_value;

		return Response::json($data);
	}
}
