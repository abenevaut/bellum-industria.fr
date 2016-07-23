<?php namespace cms\Domain\Users\Users\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Core\Events\Event;
use cms\Domain\Users\Users\User;

/**
 * Class NewAdminCreatedEvent
 * @package cms\Domain\Users\Users\Events
 */
class NewAdminCreatedEvent extends Event
{

	use SerializesModels;

	/**
	 * The current user.
	 *
	 * @var User|null
	 */
	public $user = null;

	/**
	 * NewAdminCreatedEvent constructor.
	 *
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Get the channels the event should be broadcast on.
	 *
	 * @return array
	 */
	public function broadcastOn()
	{
		return [];
	}
}
