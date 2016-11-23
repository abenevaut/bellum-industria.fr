<?php namespace cms\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use cms\Domain\Users\Users\User;

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

		Gate::define(User::ROLE_SUPERADMIN, function ($user)
		{
			return $user->is_super_administrator;
		});

		Gate::define(User::ROLE_ADMIN, function ($user)
		{
			return $user->is_administrator;
		});

		Gate::define(User::ROLE_MODERATOR, function ($user)
		{
			return $user->is_moderator;
		});

		Gate::define(User::ROLE_USER, function ($user)
		{
			return $user->is_user;
		});
    }
}
