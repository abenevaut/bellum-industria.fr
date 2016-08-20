<?php namespace cms\App\Listeners;

use cms\Domain\Environments\Environments\Events\EnvironmentCreatedEvent;
use cms\Domain\Users\Users\Events\NewUserRegisteredEvent;

/**
 * Class UserEventsListener
 * @package cms\App\Listeners
 */
class UserEventsListener
{

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher $events
	 */
	public function subscribe($events)
	{
		$events->listen(
			'cms\Domain\Users\Users\Events\NewUserRegisteredEvent',
			'cms\App\Listeners\UserEventsListener@newUserRegisteredEvent'
		);
	}

	/**
	 * Handle newUserRegisteredEvent events.
	 *
	 * @param EnvironmentCreatedEvent $event
	 */
	public function newUserRegisteredEvent(NewUserRegisteredEvent $event)
	{
		session()->flash('message-success', trans('auth.message_success_register'));
	}

}