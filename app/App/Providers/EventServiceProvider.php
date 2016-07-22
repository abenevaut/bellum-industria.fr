<?php namespace cms\App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * @package cms\App\Providers
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
		'cms\App\Listeners\EnvironmentEventsListener'
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
