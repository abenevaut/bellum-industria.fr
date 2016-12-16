<?php namespace cms\Domain\Files\Files\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\FilesystemAdapter;
use cms\Domain\Files\Files\Repositories\DiskRepository;

/**
 * Class ElFinderDiskRepository
 * @package cms\Domain\Files\Files\Repositories
 */
class ElFinderDiskRepository extends DiskRepository
{

	/**
	 * Get elfinder.roots settings.
	 * https://github.com/Studio-42/elFinder/wiki/Multiple-Roots
	 *
	 * @param string $environment_reference
	 *
	 * @return mixed
	 */
	public function getElFinderRoots($environment_reference = null)
	{
		return (array)\Settings::setEnvironment($environment_reference)
			->get('elfinder.roots', []);
	}

	/**
	 * Allow to mount an elFinder disk based on a directory path.
	 *
	 * @param string $new_directory The directory path
	 * @param string $environment_reference
	 */
	public function mountElFinderDirectory(
		$new_directory,
		$environment_reference = null
	)
	{
		$directories = \Settings::setEnvironment($environment_reference)
			->get('elfinder.dir', []);

		if (empty($directories))
		{
			$directories = [];
		}
		else if (is_string($directories))
		{
			$directories = [$directories];
		}

		\Settings::setEnvironment($environment_reference)
			->set(
				'elfinder.dir',
				$directories + [$new_directory]
			);
	}

	/**
	 * Allow to unmount an elFinder disk based on a directory path.
	 *
	 * @param string $directory The directory path
	 * @param string $environment_reference
	 */
	public function unmountElFinderDirectory($directory, $environment_reference = null)
	{
		$directories = \Settings::setEnvironment($environment_reference)
			->get('elfinder.dir', []);
		unset($directories[array_search($directory, $directories)]);

		\Settings::setEnvironment($environment_reference)
			->forget('elfinder.dir');

		\Settings::setEnvironment($environment_reference)
			->set('elfinder.dir', $directories);
	}

	/**
	 * Get the list of all directories path based disks.
	 *
	 * @param null $environment_reference
	 *
	 * @return array
	 */
	public function getElFinderDirectories($environment_reference = null)
	{
		return \Settings::setEnvironment($environment_reference)
			->get('elfinder.dir', []);
	}

	/**
	 * Return the list of mountable directories available for elFinder.
	 * The list is required by the elFinder connector.
	 *
	 * @param null $environment_reference
	 *
	 * @return array
	 */
	public function getMountableElFinderDirectoriesList($environment_reference = null)
	{
		$roots = [];
		$dirs = $this->getElFinderDirectories($environment_reference);

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
	 * @param string $environment_reference
	 */
	public function mountElFinderDisk($disk_reference, $options, $environment_reference = null)
	{
		$disks = \Settings::resetEnvironment()
			->get('elfinder.disks', []);

		$disks = is_null($disks) ? [] : $disks;

		\Settings::setEnvironment($environment_reference)
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
	 * @param string $environment_reference
	 */
	public function unmountElFinderDisk($disk_reference, $environment_reference = null)
	{
		$disks = \Settings::setEnvironment($environment_reference)
			->get('elfinder.disks', [], $environment_reference);
		unset($disks[$disk_reference]);

		\Settings::setEnvironment($environment_reference)
			->forget('elfinder.disks', $environment_reference);
		\Settings::setEnvironment($environment_reference)
			->set('elfinder.disks', $disks, $environment_reference);
	}

	/**
	 * Get the list of all disks based on file system disk configuration.
	 *
	 * @param string $environment_reference
	 *
	 * @return array
	 */
	public function getElFinderDisks($environment_reference = null)
	{
		return (array)\Settings::setEnvironment($environment_reference)
			->get('elfinder.disks', []);
	}

	/**
	 * Return the list of mountable disks available for elFinder.
	 * The list is required by the elFinder connector.
	 *
	 * @param null $environment_reference
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function getMountableElFinderDisksList($environment_reference = null)
	{
		$roots = [];
		$disks = $this->getElFinderDisks($environment_reference);

		dd($disks);

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
		return Auth::user()->hasRole($root['access']['roles'])
			|| Auth::user()->hasRole($root['access']['permissions']);
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
		$access = 'cms\Domain\Files\Files\Access\DontShowFilesStartingWithDot::checkAccess';

		if (
			is_array($options)
			&& array_key_exists('access', $options)
			&& array_key_exists('readonly', $options['access'])
			&& $options['access']['readonly']
		)
		{
			$access = 'cms\Domain\Files\Files\Access\ReadOnly::checkAccess';
		}

		if (array_key_exists('access', $options))
		{
			unset($options['access']);
		}

		$disk = app('filesystem')->disk($disk_name);

		if ($disk instanceof FilesystemAdapter)
		{
			$defaults = [
				'driver'        => 'Flysystem',
				'filesystem'    => $disk->getDriver(),
				'alias'         => $disk_name,
				'accessControl' => $access,
			];

			return array_merge($defaults, $options);
		}

		throw new \Exception('Disk : ' . $disk_name . ' unmountable!');
	}

}
