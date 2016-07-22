<?php namespace Core\Domain\Users\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Core\Events\Event;
use Core\Domain\Users\Entities\User;

/**
 * Class UserDeletedEvent
 * @package Core\Domain\Users\Events
 */
class UserDeletedEvent extends Event
{

	use SerializesModels;

	/**
	 * The current user ID.
	 *
	 * @var int
	 */
	public $user_id = 0;

	/**
	 * UserDeletedEvent constructor.
	 *
	 * @param $id
	 */
	public function __construct($id)
	{
		$this->user_id = $id;
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
