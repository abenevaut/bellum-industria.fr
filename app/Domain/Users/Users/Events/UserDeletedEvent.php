<?php namespace cms\Domain\Users\Users\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use cms\Infrastructure\Abstractions\Events\EventAbstract;
use cms\Domain\Users\Users\User;

/**
 * Class UserDeletedEvent
 * @package cms\Domain\Users\Users\Events
 */
class UserDeletedEvent extends EventAbstract
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
