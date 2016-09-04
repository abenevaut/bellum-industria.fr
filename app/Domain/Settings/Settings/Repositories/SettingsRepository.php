<?php namespace cms\Domain\Settings\Settings\Repositories;

use CVEPDB\Settings\Facades\Settings as SettingsFacade;
use cms\Infrastructure\Abstractions\Requests\FormRequestAbstract;

/**
 * Class SettingsRepository
 * @package cms\Domain\Settings\Settings\Repositories
 */
class SettingsRepository
{

	/**
	 * @return mixed
	 */
	public function all()
	{
		$settings = SettingsFacade::getAll();

		return $settings;
	}

	/**
	 * @param $key
	 * @param $data
	 */
	public function set($key, $data)
	{
		SettingsFacade::set($key, $data);
	}

	/**
	 * @param $key
	 */
	public function get($key)
	{
		return SettingsFacade::get($key);
	}

	/**
	 * @param $key
	 */
	public function delete($key)
	{
		SettingsFacade::forget($key);
	}

	/**
	 * @return mixed
	 */
	public function index()
	{
		return view('app.backend.settings.index', ['settings' => $this]);
	}

	/**
	 * @param FormRequestAbstract $request
	 *
	 * @return mixed
	 */
	public function store(FormRequestAbstract $request)
	{
		$posts = $request->all();
		unset($posts['_token']);

		$settings_keys = config('settings.form_key_to_settings');

		foreach ($posts as $key => $value)
		{
			$this->set($settings_keys[$key], $value);
		}

		return redirect(route('backend.settings.index'));
	}

}
