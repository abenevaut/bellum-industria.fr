<?php namespace cms\App\Providers;

use Illuminate\Support\AggregateServiceProvider;

/**
 * Class ConsoleSupportServiceProvider
 * @package cms\App\Providers
 */
class ConsoleSupportServiceProvider extends AggregateServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * The provider class names.
	 *
	 * @var array
	 */
	protected $providers = [
		'Illuminate\Console\ScheduleServiceProvider',
		'Illuminate\Database\SeedServiceProvider',
		'Illuminate\Foundation\Providers\ComposerServiceProvider',
		'Illuminate\Queue\ConsoleServiceProvider',
		'cms\App\Providers\ArtisanServiceProvider',
		'cms\App\Providers\MigrationServiceProvider',
	];
}
