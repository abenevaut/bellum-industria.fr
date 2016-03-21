<?php namespace Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Passwords\PasswordBrokerManager;

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
        $this->app->singleton('auth.password', function ($app) {
            return new PasswordBrokerManager($app);
        });

        $this->app->bind('auth.password.broker', function ($app) {
            //return $app->make('auth.password')->broker();

            $tokens = $app->make('auth.password')->createTokenRepository();
            $users = $app['auth']->driver()->getProvider();
            $view = $app['config']['auth.password.email'];

            return new PasswordBroker(
                $tokens, $users, $app['mailer'], $view
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['auth.password', 'auth.password.broker'];
    }
}
