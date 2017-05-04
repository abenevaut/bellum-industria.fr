<?php namespace cms\App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use cms\Domain\Users\Users\Events\UserCreatedEvent;
use cms\Domain\Users\Users\Events\UserUpdatedEvent;
use cms\Domain\Users\Users\Events\UserDeletedEvent;
use cms\Domain\Users\Users\Events\NewSuperAdminCreatedEvent;
use cms\Domain\Users\Users\Events\NewAdminCreatedEvent;
use cms\Domain\Users\Users\Events\NewUserCreatedEvent;

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
			'cms\Domain\Users\Users\Events\NewSuperAdminCreatedEvent',
			'cms\App\Listeners\UsersEventsListener@handleNewSuperAdminCreatedEvent'
		);
		$events->listen(
			'cms\Domain\Users\Users\Events\NewAdminCreatedEvent',
			'cms\App\Listeners\UsersEventsListener@handleNewAdminCreatedEvent'
		);
		$events->listen(
			'cms\Domain\Users\Users\Events\NewUserCreatedEvent',
			'cms\App\Listeners\UsersEventsListener@handleNewUserCreatedEvent'
		);
	}

	/**
	 * Handle created user event.
	 *
	 * @param \cms\Domain\Users\Users\Events\UserCreatedEvent $event
	 */
	public function handleUserCreatedEvent(UserCreatedEvent $event) {
		// implement
	}

	/**
	 * Handle updated user event.
	 *
	 * @param UserUpdatedEvent $event
	 */
	public function handleUserUpdatedEvent(UserUpdatedEvent $event) {
		// implement
	}

	/**
	 * Handle deleted user event.
	 *
	 * @param UserDeletedEvent $event
	 */
	public function handleUserDeletedEvent(UserDeletedEvent $event) {
		// implement
	}

	/**
	 * Handle new super admin created event.
	 *
	 * @param NewSuperAdminCreatedEvent $event
	 */
	public function handleNewSuperAdminCreatedEvent(NewSuperAdminCreatedEvent $event) {
		// implement
	}

	/**
	 * Handle new admin created event.
	 *
	 * @param NewAdminCreatedEvent $event
	 */
	public function handleNewAdminCreatedEvent(NewAdminCreatedEvent $event) {
		// implement
	}

	/**
	 * Handle new user created event.
	 *
	 * @param NewUserCreatedEvent $event
	 */
	public function handleNewUserCreatedEvent(NewUserCreatedEvent $event) {
		// implement
	}
}
