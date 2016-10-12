<?php namespace cms\App\Providers;

use Illuminate\Support\Facades\Gate;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

		Gate::define('super-administrator', function ($user)
		{
			return true; //$user->isSuperAdmin();
		});

		Gate::define('administrator', function ($user)
		{
			return true; //$user->isAdmin();
		});

		Gate::define('moderator', function ($user)
		{
			return true; //$user->isModerator();
		});
    }
}
