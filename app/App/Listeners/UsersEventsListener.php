<?php namespace cms\App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use cms\Domain\Users\Users\Events\UserCreatedEvent;
use cms\Domain\Users\Users\Events\UserUpdatedEvent;
use cms\Domain\Users\Users\Events\UserDeletedEvent;

class UsersEventsListener
{

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher $events
	 */
	public function subscribe($events) {
		$events->listen(
			'cms\Domain\Users\Users\Events\UserCreatedEvent',
			'cms\App\Listeners\UsersEventsListener@handleUserCreatedEvent'
		);
		$events->listen(
			'cms\Domain\Users\Users\Events\UserUpdatedEvent',
			'cms\App\Listeners\UsersEventsListener@handleUserUpdatedEvent'
		);
		$events->listen(
			'cms\Domain\Users\Users\Events\UserDeletedEvent',
			'cms\App\Listeners\UsersEventsListener@handleUserDeletedEvent'
		);
		$events->listen(
			'cms\Domain\Users\Users\Events\NewUserRegisteredEvent',
			'cms\App\Listeners\UsersEventsListener@newUserRegisteredEvent'
		);
	}

	/**
	 * Handle created event.
	 *
	 * @param \cms\Domain\Users\Users\Events\UserCreatedEvent $event
	 */
	public function handleUserCreatedEvent(UserCreatedEvent $event) {
		// implement
	}

	/**
	 * Handle updated event.
	 *
	 * @param \cms\Domain\Users\Users\Events\UserUpdatedEvent $event
	 */
	public function handleUserUpdatedEvent(UserUpdatedEvent $event) {
		// implement
	}

	/**
	 * Handle deleted event.
	 *
	 * @param \cms\Domain\Users\Users\Events\UserDeletedEvent $event
	 */
	public function handleUserDeletedEvent(UserDeletedEvent $event) {
		// implement
	}
}
