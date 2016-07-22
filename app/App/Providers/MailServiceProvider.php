<?php namespace cms\App\Providers;

use Illuminate\Mail\MailServiceProvider as IlluminateMailServiceProvider;
use cms\App\Factories\MailTransportManagerFactory;

/**
 * Class MailServiceProvider
 * @package cms\App\Providers
 */
class MailServiceProvider extends IlluminateMailServiceProvider
{

	/**
	 * Register the Swift Transport instance.
	 *
	 * @return void
	 */
	protected function registerSwiftTransport()
	{
		if (cmsinstalled())
		{
			$this->app['swift.transport'] = $this->app->share(function ($app)
			{
				return new MailTransportManagerFactory($app);
			});
		}
	}
}
