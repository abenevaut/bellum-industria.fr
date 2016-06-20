<?php namespace Core\Domain\Settings;

use Illuminate\Support\Facades\Config;
use CVEPDB\Settings\Settings as CVEPDBSettings;
use Core\Domain\Environments\Facades\EnvironmentFacade;

/**
 * Class Settings
 * @package CVEPDB\Settings
 */
class Settings extends CVEPDBSettings
{

	/**
	 * Gets a value
	 *
	 * @param  string $key
	 * @param  string $default
	 * @param  string $environment_reference
	 *
	 * @return mixed
	 */
	public function get($key, $default = null, $environment_reference = null)
	{
		$value = $this->fetch($key);

		if (is_null($environment_reference))
		{
			$environment_reference = EnvironmentFacade::current();
		}

		if (!is_null($value))
		{
			$value = $value->get($environment_reference);
		}

		if (!is_null($value))
		{
			return $value;
		}
		else if ($default != null)
		{
			return $default;
		}
		else if ($this->config['fallback'])
		{
			return Config::get($key, null);
		}
		else
		{
			return $default;
		}
	}

	/**
	 * @param $key
	 *
	 * @return mixed|null
	 */
	private function fetch($key)
	{
		$row = null;

		if ($this->cache->hasKey($key))
		{
			$row = $this->cache->get($key);
		}
		else
		{
			$row = $this->database
				->table($this->config['db_table'])
				->where('setting_key', $key)
				->first(['setting_value']);

			$row = (!is_null($row))
				? $this->cache->set($key, unserialize($row->setting_value))
				: null;
		}

		return $row;
	}


	/**
	 * Checks if setting exists
	 *
	 * @param $key
	 *
	 * @return bool
	 */
	public function hasKey($key)
	{
		if ($this->cache->hasKey($key))
		{
			return true;
		}

		$row = $this->database
			->table($this->config['db_table'])
			->where('setting_key', $key)
			->first(['setting_value']);

		return (count($row) > 0);
	}

	/**
	 * Store value into registry
	 *
	 * @param  string $key
	 * @param  mixed  $value
	 * @param  string $environment_reference
	 *
	 * @return mixed
	 */
	public function set($key, $value, $environment_reference = null)
	{
		$db_value = $this->fetch($key);

		if (is_null($environment_reference))
		{
			$environment_reference = EnvironmentFacade::current();
		}

		if (is_null($db_value))
		{
			$db_value = collect([]);
		}

		$db_value->put($environment_reference, $value);

		$value = serialize($db_value);

		$setting = $this->database
			->table($this->config['db_table'])
			->where('setting_key', $key)
			->first();

		if (is_null($setting))
		{
			$this->database
				->table($this->config['db_table'])
				->insert(['setting_key' => $key, 'setting_value' => $value]);
		}
		else
		{
			$this->database
				->table($this->config['db_table'])
				->where('setting_key', $key)
				->update(['setting_value' => $value]);
		}

		$this->cache->set($key, unserialize($value));

		return $value;
	}

	/**
	 * Remove a setting
	 *
	 * @param  string $key
	 *
	 * @return void
	 */
	public function forget($key, $environment_reference = null)
	{
		$value = $this->fetch($key);

		$value->forget($environment_reference);

		$value = serialize($value);

		$setting = $this->database
			->table($this->config['db_table'])
			->where('setting_key', $key)
			->first();

		if (is_null($setting))
		{
			$this->database
				->table($this->config['db_table'])
				->insert(['setting_key' => $key, 'setting_value' => $value]);
		}
		else
		{
			$this->database
				->table($this->config['db_table'])
				->where('setting_key', $key)
				->update(['setting_value' => $value]);
		}

		$this->cache->set($key, unserialize($value));
	}

}
