<?php namespace cms\Domain\Files\Files\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\FilesystemAdapter;
use CVEPDB\Settings\Facades\Settings;

/**
 * Class DiskRepository
 * @package cms\Domain\Files\Files\Repositories
 */
class DiskRepository
{

	/**
	 * Set a file system disk as the default file system.
	 *
	 * @param string $disk_name
	 * @param string $environment_reference Default: the current environment
	 */
	public function setDefaultFileSystemDisk(
		$disk_name,
		$environment_reference = null
	)
	{
		Settings::set(
			'filesystems.default',
			$disk_name,
			$environment_reference
		);
	}

	/**
	 * Set a cloud system as the default cloud system.
	 *
	 * @param string $disk_name
	 * @param string $environment_reference Default: the current environment
	 */
	public function setDefaultCloudSystemDisk(
		$disk_name,
		$environment_reference = null
	)
	{
		Settings::set(
			'filesystems.cloud',
			$disk_name,
			$environment_reference
		);
	}

	/**
	 * Add a new file system.
	 *
	 *
	 * @param string $disk_reference The disk name
	 * @param array  $options Based on Laravel file system
	 *     https://laravel.com/docs/master/filesystem
	 * @param string $environment_reference
	 */
	public function addFileSystemDisk($disk_reference, $options, $environment_reference = null)
	{
		$disks = Settings::get('filesystems.disks', [], $environment_reference);
		Settings::set(
			'filesystems.disks',
			$disks + [$disk_reference => $options],
			$environment_reference
		);
	}

}
