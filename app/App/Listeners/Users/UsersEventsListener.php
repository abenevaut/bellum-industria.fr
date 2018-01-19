<?php namespace abenevaut\App\Listeners\Users;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use abenevaut\Domain\Users\Users\Events\UserCreatedEvent;
use abenevaut\Domain\Users\Users\Events\UserUpdatedEvent;
use abenevaut\Domain\Users\Users\Events\UserDeletedEvent;
use abenevaut\Domain\Users\Users\Events\UserTriedToDeleteHisOwnAccountEvent;

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
			'abenevaut\Domain\Users\Users\Events\UserCreatedEvent',
			'abenevaut\App\Listeners\Users\UsersEventsListener@handleUserCreatedEvent'
		);
		$events->listen(
			'abenevaut\Domain\Users\Users\Events\UserUpdatedEvent',
			'abenevaut\App\Listeners\Users\UsersEventsListener@handleUserUpdatedEvent'
		);
		$events->listen(
			'abenevaut\Domain\Users\Users\Events\UserDeletedEvent',
			'abenevaut\App\Listeners\Users\UsersEventsListener@handleUserDeletedEvent'
		);
		$events->listen(
			'abenevaut\Domain\Users\Users\Events\UserTriedToDeleteHisOwnAccountEvent',
			'abenevaut\App\Listeners\Users\UsersEventsListener@handleUserTriedToDeleteHisOwnAccountEventEvent'
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
