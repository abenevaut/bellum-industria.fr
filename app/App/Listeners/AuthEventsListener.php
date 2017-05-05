<?php

namespace cms\App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class AuthEventsListener
{

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher $events
	 */
	public function subscribe($events) {
		$events->listen(
			'Illuminate\Auth\Events\Login',
			'cms\App\Listeners\AuthEventsListener@handleLoginEvent'
		);
		$events->listen(
			'Illuminate\Auth\Events\Logout',
			'cms\App\Listeners\AuthEventsListener@handleLogoutEvent'
		);
	}

	/**
	 * Handle Login events.
	 *
	 * @param \Illuminate\Auth\Events\Login $event
	 */
	public function handleLoginEvent(Login $event) {
		// implement
	}

	/**
	 * Handle Logout events.
	 *
	 * @param \Illuminate\Auth\Events\Logout $event
	 */
	public function handleLogoutEvent(Logout $event) {
		// implement
	}
}
