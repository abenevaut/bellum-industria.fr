<?php namespace cms\Domain\Files\Files\Repositories;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Gate;

class ElFinderDiskRepository extends DiskRepository
{

	/**
	 * Get elfinder.roots settings.
	 * https://github.com/Studio-42/elFinder/wiki/Multiple-Roots
	 *
	 * @param string $domain_reference
	 *
	 * @return mixed
	 */
	public function getElFinderRoots($domain_reference = null)
	{
		return (array)\Settings::setDomain($domain_reference)
			->get('elfinder.roots', []);
	}

	/**
	 * Allow to mount an elFinder disk based on a directory path.
	 *
	 * @param string $new_directory The directory path
	 * @param string $domain_reference
	 */
	public function mountElFinderDirectory(
		$new_directory,
		$domain_reference = null
	)
	{
		$directories = \Settings::setDomain($domain_reference)
			->get('elfinder.dir', []);

		if (empty($directories))
		{
			$directories = [];
		}
		else if (is_string($directories))
		{
			$directories = [$directories];
		}

		\Settings::setDomain($domain_reference)
			->set(
				'elfinder.dir',
				$directories + [$new_directory]
			);
	}

	/**
	 * Allow to unmount an elFinder disk based on a directory path.
	 *
	 * @param string $directory The directory path
	 * @param string $domain_reference
	 */
	public function unmountElFinderDirectory($directory, $domain_reference = null)
	{
		$directories = \Settings::setDomain($domain_reference)
			->get('elfinder.dir', []);
		unset($directories[array_search($directory, $directories)]);

		\Settings::setDomain($domain_reference)
			->forget('elfinder.dir');

		\Settings::setDomain($domain_reference)
			->set('elfinder.dir', $directories);
	}

	/**
	 * Get the list of all directories path based disks.
	 *
	 * @param null $domain_reference
	 *
	 * @return array
	 */
	public function getElFinderDirectories($domain_reference = null)
	{
		return \Settings::setDomain($domain_reference)
			->get('elfinder.dir', []);
	}

	/**
	 * Return the list of mountable directories available for elFinder.
	 * The list is required by the elFinder connector.
	 *
	 * @param null $domain_reference
	 *
	 * @return array
	 */
	public function getMountableElFinderDirectoriesList($domain_reference = null)
	{
		$roots = [];
		$dirs = $this->getElFinderDirectories($domain_reference);

		foreach ($dirs as $dir)
		{
			$roots[] = [
				'driver'        => 'LocalFileSystem',
				'path'          => public_path($dir),
				'URL'           => url($dir),
				'accessControl' => 'cms\Domain\Files\Files\Access\DontShowFilesStartingWithDot::checkAccess'
			];
		}

		return $roots;
	}

	/**
	 * Allow to mount an elFinder disk based on file system disk configuration.
	 *
	 * @param string $disk_reference
	 * @param array  $options
	 * @param string $domain_reference
	 */
	public function mountElFinderDisk($disk_reference, $options, $domain_reference = null)
	{
		$disks = \Settings::resetDomain()
			->get('elfinder.disks', []);

		$disks = is_null($disks) ? [] : $disks;

		\Settings::setDomain($domain_reference)
			->set(
				'elfinder.disks',
				$disks + [$disk_reference => $options]
			);
	}

	/**
	 * Allow to unmount an elFinder disk based on file system disk
	 * configuration.
	 *
	 * @param string $disk_reference
	 * @param string $domain_reference
	 */
	public function unmountElFinderDisk($disk_reference, $domain_reference = null)
	{
		$disks = \Settings::setDomain($domain_reference)
			->get('elfinder.disks', [], $domain_reference);
		unset($disks[$disk_reference]);

		\Settings::setDomain($domain_reference)
			->forget('elfinder.disks', $domain_reference);
		\Settings::setDomain($domain_reference)
			->set('elfinder.disks', $disks, $domain_reference);
	}

	/**
	 * Get the list of all disks based on file system disk configuration.
	 *
	 * @param string $domain_reference
	 *
	 * @return array
	 */
	public function getElFinderDisks($domain_reference = null)
	{
		return (array)\Settings::setDomain($domain_reference)
			->get('elfinder.disks', []);
	}

	/**
	 * Return the list of mountable disks available for elFinder.
	 * The list is required by the elFinder connector.
	 *
	 * @param null $domain_reference
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function getMountableElFinderDisksList($domain_reference = null)
	{
		$roots = [];
		$disks = $this->getElFinderDisks($domain_reference);

		foreach ($disks as $disk_name => $options)
		{
			if (is_string($options))
			{
				$disk_name = $options;
				$options = [];
			}

			if ($this->isElFinderDiskRestricted($options))
			{
				if ($this->isElFinderDiskCouldBeMount($options))
				{
					$roots[] = $this->elFinderMountDisk($disk_name, $options);
				}
			}
			else
			{
				$roots[] = $this->elFinderMountDisk($disk_name, $options);
			}
		}

		return $roots;
	}

	/**
	 * Check in disk settings to know if a disk is role or permission
	 * restricted.
	 *
	 * @param $root
	 *
	 * @return bool
	 */
	protected function isElFinderDiskRestricted($root)
	{
		return is_array($root)
			&& array_key_exists('access', $root)
			&& (
				array_key_exists('roles', $root['access'])
				|| array_key_exists('permissions', $root['access'])
			);
	}

	/**
	 * Check in disk settings to know if a disk could be use by the current
	 * user.
	 *
	 * @param $root
	 *
	 * @return bool
	 */
	protected function isElFinderDiskCouldBeMount($root)
	{
		$is_allowed = collect($root['access']['roles'])
			->filter(function ($role)
			{
				return Gate::allows($role);
			});

		return $is_allowed->count();
	}

	/**
	 * @param $disk_name
	 * @param $options
	 *
	 * @return array
	 * @throws \Exception
	 */
	protected function elFinderMountDisk($disk_name, $options)
	{
		$disk = app('filesystem')->disk($disk_name);

		if ($disk instanceof FilesystemAdapter)
		{
			$defaults = [
				'driver'     => 'Flysystem',
				'filesystem' => $disk->getDriver(),
				'alias'      => $disk_name,
				'tmbPath'    => storage_path($options['tmbPath']),
//				'uploadDeny'    => ['all'],
//				'uploadAllow'   => ['image', 'text/plain'],
//				'uploadOrder'   => ['deny', 'allow'],
			];

			return array_merge($options, $defaults);
		}

		throw new \Exception('Disk : ' . $disk_name . ' unmountable!');
	}

}
