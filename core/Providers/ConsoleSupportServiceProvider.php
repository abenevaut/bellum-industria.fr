<?php namespace Core\Providers;

use Illuminate\Support\AggregateServiceProvider;

/**
 * Class ConsoleSupportServiceProvider
 * @package Core\Providers
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
		'Core\Providers\ArtisanServiceProvider',
		'Core\Providers\MigrationServiceProvider',
	];
}
