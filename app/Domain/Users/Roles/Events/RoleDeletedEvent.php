<?php namespace cms\Domain\Users\Roles\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use cms\Infrastructure\Abstractions\Events\EventAbstract;

/**
 * Class RoleDeletedEvent
 * @package cms\Domain\Users\Roles\Events
 */
class RoleDeletedEvent extends EventAbstract
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
