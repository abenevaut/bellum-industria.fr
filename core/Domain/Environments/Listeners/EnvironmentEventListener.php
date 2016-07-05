<?php namespace Core\Domain\Environments\Listeners;

use Core\Domain\Environments\Events\EnvironmentCreatedEvent;
use Core\Domain\Environments\Events\EnvironmentDeletedEvent;

/**
 * Class EnvironmentEventListener
 * @package Core\Domain\Environments\Listeners
 */
class EnvironmentEventListener
{

	/**
	 * EnvironmentEventListener constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  Illuminate\Events\Dispatcher $events
	 */
	public function subscribe($events)
	{
		$events->listen(
			'Core\Domain\Environments\Events\EnvironmentCreatedEvent',
			'Core\Domain\Environments\Listeners\EnvironmentEventListener@environmentCreatedEvent'
		);
		$events->listen(
			'Core\Domain\Environments\Events\EnvironmentDeletedEvent',
			'Core\Domain\Environments\Listeners\EnvironmentEventListener@environmentDeletedEvent'
		);
	}

	/**
	 * Handle EnvironmentCreatedEvent events.
	 *
	 * Set directories access for default and new environment.
	 *
	 * @param EnvironmentCreatedEvent $event
	 */
	public function environmentDeletedEvent(EnvironmentDeletedEvent $event)
	{
	}

	/**
	 * Handle EnvironmentCreatedEvent events.
	 *
	 * Set directories access for default and new environment.
	 *
	 * @param EnvironmentCreatedEvent $event
	 */
	public function environmentCreatedEvent(EnvironmentCreatedEvent $event)
	{
	}
}