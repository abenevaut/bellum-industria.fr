<?php namespace cms\Core\Domain\Users\Roles\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Core\Events\Event;

/**
 * Class RoleDeletedEvent
 * @package Core\Domain\Roles\Events
 */
class RoleDeletedEvent extends Event
{

	use SerializesModels;

	/**
	 * The current role ID.
	 *
	 * @var int
	 */
	public $role_id = 0;

	/**
	 * RoleDeletedEvent constructor.
	 *
	 * @param $id
	 */
	public function __construct($id)
	{
		$this->role_id = $id;
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
