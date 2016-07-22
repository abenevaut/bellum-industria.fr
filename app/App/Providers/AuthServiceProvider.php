<?php namespace cms\App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class AuthServiceProvider
 * @package cms\App\Providers
 */
class AuthServiceProvider extends ServiceProvider
{

	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'Core\Model' => 'Core\Policies\ModelPolicy',
	];

	/**
	 * Register any application authentication / authorization services.
	 *
	 * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
	 *
	 * @return void
	 */
	public function boot(GateContract $gate)
	{
		$this->registerPolicies($gate);
	}
}
