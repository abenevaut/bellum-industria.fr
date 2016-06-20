<?php namespace Core\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Core\Providers
 */
class EventServiceProvider extends ServiceProvider
{

	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
	];

	/**
	 * The subscriber classes to register.
	 *
	 * @var array
	 */
	protected $subscribe = [
		'Core\Domain\Environments\Listeners\EnvironmentEventListener',
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher $events
	 *
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);
	}
}
