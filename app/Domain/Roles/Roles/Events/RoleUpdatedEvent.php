<?php namespace cms\Core\Domain\Roles\Roles\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Core\Events\Event;
use cms\Core\Domain\Roles\Roles\Role;

/**
 * Class RoleUpdatedEvent
 * @package cms\Core\Domain\Roles\Roles\Events
 */
class RoleUpdatedEvent extends Event
{

	use SerializesModels;

	/**
	 * The current role.
	 *
	 * @var Role|null
	 */
	public $role = null;

	/**
	 * RoleUpdatedEvent constructor.
	 *
	 * @param Role $role
	 */
	public function __construct(Role $role)
	{
		$this->role = $role;
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
