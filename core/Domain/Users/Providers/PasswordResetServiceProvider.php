<?php namespace Core\Domain\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Core\Domain\Users\Brokers\PasswordBrokerManager;

class PasswordResetServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerPasswordBroker();
	}

	/**
	 * Register the password broker instance.
	 *
	 * @return void
	 */
	protected function registerPasswordBroker()
	{
		if (cmsinstalled())
		{
			$this->app->singleton('auth.password', function ($app) {
				return new PasswordBrokerManager($app);
			});

			$this->app->bind('auth.password.broker', function ($app) {
				return $app->make('auth.password')->broker();
			});
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return cmsinstalled()
			? ['auth.password', 'auth.password.broker']
			: [];
	}
}
