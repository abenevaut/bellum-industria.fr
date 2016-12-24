<?php namespace cms\App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

/**
 * Class AppServiceProvider
 * @package cms\App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		if (!$this->app->environment('production'))
		{
			if (config('app.debug'))
			{
				// Antennaio\Codeception
				$this
					->app
					->register(
						\Antennaio\Codeception\DbDumpServiceProvider::class
					);

				// Barryvdh\Debugbar
				$this
					->app
					->register(
						\Barryvdh\Debugbar\ServiceProvider::class
					);

				AliasLoader::getInstance([
					'Debugbar' => \Barryvdh\Debugbar\Facade::class
				])
					->register();
			}

			if ($this->app->environment('local'))
			{
				$this
					->app
					->register(
						\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class
					);
			}
		}

		if (class_exists(\Sentry\SentryLaravel\SentryFacade::class) && !is_null(config('sentry.dsn')))
		{
			// Sentry\SentryLaravel
			$this
				->app
				->register(
					\Sentry\SentryLaravel\SentryLaravelServiceProvider::class
				);

			AliasLoader::getInstance([
				'Sentry' => \Sentry\SentryLaravel\SentryFacade::class
			])
				->register();
		}
    }
}
