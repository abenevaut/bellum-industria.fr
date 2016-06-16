<?php namespace Core\Providers;

use Illuminate\Filesystem\FilesystemServiceProvider as IlluminateFilesystemServiceProvider;
use CVEPDB\Settings\Facades\Settings;
use Core\Factories\FilesystemManagerFactory as FilesystemManagerFactory;

class FilesystemServiceProvider extends IlluminateFilesystemServiceProvider
{

	/**
	 * Register the filesystem manager.
	 *
	 * @return void
	 */
	protected function registerManager()
	{
		$this->app->singleton('filesystem', function ()
		{
			return new FilesystemManagerFactory($this->app);
		});
	}

	/**
	 * Get the default file driver.
	 *
	 * @return string
	 */
	protected function getDefaultDriver()
	{
		return Settings::get('filesystems.default');
	}

	/**
	 * Get the default cloud based file driver.
	 *
	 * @return string
	 */
	protected function getCloudDriver()
	{
		return Settings::get('filesystems.cloud');
	}
}
