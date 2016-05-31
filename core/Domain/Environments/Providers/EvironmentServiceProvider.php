<?php namespace Core\Domain\Environments\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Core\Domain\Environments\Environment;

/**
 * Class EnvironmentServiceProvider
 * @package Core\Domain\Environments\Providers
 */
class EnvironmentServiceProvider extends ServiceProvider
{

	/**
	 * Register Environment instance.
	 */
	public function register()
	{
		$this->app->singleton(
			'environment',
			function ($app)
			{
				return new Environment($app);
			}
		);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('environment');
	}

}
