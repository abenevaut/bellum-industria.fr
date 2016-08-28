<?php namespace cms\App\Factories;

use Illuminate\Filesystem\FilesystemManager as IlluminateFilesystemManager;
use CVEPDB\Settings\Facades\Settings;

/**
 * Class FilesystemManagerFactory
 * @package cms\App\Factories
 */
class FilesystemManagerFactory extends IlluminateFilesystemManager
{

	/**
	 * Get the filesystem connection configuration.
	 *
	 * @param  string $name
	 *
	 * @return array
	 */
	protected function getConfig($name)
	{
		$disks = Settings::get("filesystems.disks");

		return $disks[$name];
	}

	/**
	 * Get the default driver name.
	 *
	 * @return string
	 */
	public function getDefaultDriver()
	{
		return Settings::get('filesystems.default');
	}

	/**
	 * Get the default cloud driver name.
	 *
	 * @return string
	 */
	public function getDefaultCloudDriver()
	{
		return Settings::get('filesystems.cloud');
	}

}
