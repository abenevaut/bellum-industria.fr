<?php namespace cms\Domain\Settings\Settings\Repositories;

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
		$settings = \Settings::getAll();

		return $settings;
	}

	/**
	 * @param $key
	 * @param $data
	 */
	public function set($key, $data)
	{
		\Settings::set($key, $data);
	}

	/**
	 * @param $key
	 */
	public function get($key)
	{
		return \Settings::get($key);
	}

	/**
	 * @param $key
	 */
	public function delete($key)
	{
		\Settings::forget($key);
	}
}
