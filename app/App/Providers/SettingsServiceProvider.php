<?php namespace cms\App\Providers;

use CVEPDB\Settings\SettingsServiceProvider as CVEPDBSettingsServiceProvider;
use CVEPDB\Settings\Cache;
use Core\Domain\Settings\Settings;

/**
 * Class SettingsServiceProvider
 * @package cms\App\Providers
 */
class SettingsServiceProvider extends CVEPDBSettingsServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['settings'] = $this->app->share(function ($app)
		{

			$config = $app->config->get('settings', [
				'cache_file' => storage_path('settings.json'),
				'db_table'   => 'settings'
			]);

			return new Settings($app['db'], new Cache($config['cache_file']), $config);
		});
	}

}
