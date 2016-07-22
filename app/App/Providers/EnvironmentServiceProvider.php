<?php namespace cms\App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use cms\App\Services\Environments\Environments\Environment;

/**
 * Class EnvironmentServiceProvider
 * @package cms\App\Providers
 */
class EnvironmentServiceProvider extends ServiceProvider
{

	/**
	 * Register Environment instance.
	 */
	public function register()
	{
		$this->app['environment'] = $this->app->share(function ($app)
		{

//			$config = $app->config->get('settings', [
//				'cache_file' => storage_path('settings.json'),
//				'db_table'   => 'settings'
//			]);

			return new Environment($app['db'], []);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['environment'];
	}

}
