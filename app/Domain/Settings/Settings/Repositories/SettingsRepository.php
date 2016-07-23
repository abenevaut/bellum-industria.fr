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

	public function index()
	{
		return view('core.admin.settings.index', ['settings' => $this]);
	}

	public function store(FormRequestAbstract $request)
	{
		$posts = $request->all();
		unset($posts['_token']);

		foreach ($posts as $key => $value)
		{
			$setting_key = $this->get($key);
			$this->set($setting_key, $value);
		}

		return redirect('admin/settings');
	}

}
