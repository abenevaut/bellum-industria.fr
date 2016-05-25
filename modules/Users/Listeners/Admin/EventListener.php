<?php namespace Modules\Users\Listeners\Admin;

use Modules\Users\Events\Admin\NewUserCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Users\Services\MailToNewUserCreatedService;

class EventListener implements ShouldQueue
{
	use InteractsWithQueue;

	/**
	 * @var MailToNewUserCreatedService|null
	 */
	private $s_mail = null;

	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct(MailToNewUserCreatedService $s_mail)
	{
		$this->s_mail = $s_mail;
	}

	/**
	 * Handle the event.
	 *
	 * @param  SomeEvent $event
	 * @return void
	 */
	public function handle(NewUserCreatedEvent $event)
	{
		$this->s_mail->ez($event->user);
	}
}
