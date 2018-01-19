<?php namespace bellumindustria\App\Listeners\Users;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use bellumindustria\Domain\Users\Users\Events\UserCreatedEvent;
use bellumindustria\Domain\Users\Users\Events\UserUpdatedEvent;
use bellumindustria\Domain\Users\Users\Events\UserDeletedEvent;
use bellumindustria\Domain\Users\Users\Events\UserTriedToDeleteHisOwnAccountEvent;

class UsersEventsListener
{

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher $events
	 */
	public function subscribe($events)
	{
		$events->listen(
			'bellumindustria\Domain\Users\Users\Events\UserCreatedEvent',
			'bellumindustria\App\Listeners\Users\UsersEventsListener@handleUserCreatedEvent'
		);
		$events->listen(
			'bellumindustria\Domain\Users\Users\Events\UserUpdatedEvent',
			'bellumindustria\App\Listeners\Users\UsersEventsListener@handleUserUpdatedEvent'
		);
		$events->listen(
			'bellumindustria\Domain\Users\Users\Events\UserDeletedEvent',
			'bellumindustria\App\Listeners\Users\UsersEventsListener@handleUserDeletedEvent'
		);
		$events->listen(
			'bellumindustria\Domain\Users\Users\Events\UserTriedToDeleteHisOwnAccountEvent',
			'bellumindustria\App\Listeners\Users\UsersEventsListener@handleUserTriedToDeleteHisOwnAccountEventEvent'
		);
	}

	/**
	 * Handle created event.
	 *
	 * @param UserCreatedEvent $event
	 */
	public function handleUserCreatedEvent(UserCreatedEvent $event)
	{
		session()->flash('message-success', trans('users.message_created_success'));
	}

	/**
	 * Handle updated event.
	 *
	 * @param UserUpdatedEvent $event
	 */
	public function handleUserUpdatedEvent(UserUpdatedEvent $event)
	{
		session()->flash('message-success', trans('users.message_updated_success'));
	}

	/**
	 * Handle deleted event.
	 *
	 * @param UserDeletedEvent $event
	 */
	public function handleUserDeletedEvent(UserDeletedEvent $event)
	{
		session()->flash('message-success', trans('users.message_deleted_success'));
	}

	/**
	 * Handle user that tried to delete his own user account event.
	 *
	 * @param UserTriedToDeleteHisOwnAccountEvent $event
	 */
	public function handleUserTriedToDeleteHisOwnAccountEventEvent(UserTriedToDeleteHisOwnAccountEvent $event)
	{
		session()->flash('message-warning', trans('users.message_user_tried_to_delete_his_own_account_error'));
	}
}
