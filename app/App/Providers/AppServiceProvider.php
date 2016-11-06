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
		if ($this->app->environment('local'))
		{
			if (config('app.debug'))
			{
				$this->app->register(\Antennaio\Codeception\DbDumpServiceProvider::class);
				$this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
				AliasLoader::getInstance([
					'Debugbar' => \Barryvdh\Debugbar\Facade::class
				])
					->register();

//				if (!is_null(config('sentry.dsn')))
//				{
//					$this->app->register(\Sentry\SentryLaravel\SentryLaravelServiceProvider::class);
//					AliasLoader::getInstance([
//						'Sentry' => \Sentry\SentryLaravel\SentryFacade::class
//					])
//						->register();
//				}
			}

			$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
		}
    }
}
