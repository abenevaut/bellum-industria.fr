<?php namespace cms\App\Providers;

use Chrisbjr\ApiGuard\Providers\ApiGuardServiceProvider as ChrisbjrApiGuardServiceProvider;

/**
 * Class ApiGuardServiceProvider
 * @package cms\App\Providers
 */
class ApiGuardServiceProvider extends ChrisbjrApiGuardServiceProvider
{

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->commands([
			'Chrisbjr\ApiGuard\Console\Commands\GenerateApiKeyCommand',
			'Chrisbjr\ApiGuard\Console\Commands\DeleteApiKeyCommand',
		]);
	}

}
