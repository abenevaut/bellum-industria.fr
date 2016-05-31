<?php namespace Core\Domain\Users\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Core\Events\Event;
use Core\Domain\Users\Entities\User;

/**
 * Class UserUpdatedEvent
 * @package Core\Domain\Users\Events
 */
class UserUpdatedEvent extends Event
{

	use SerializesModels;

	/**
	 * The current user.
	 *
	 * @var User|null
	 */
	public $user = null;

	/**
	 * UserUpdatedEvent constructor.
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
