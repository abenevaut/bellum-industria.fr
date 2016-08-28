<?php namespace cms\Domain\Users\Roles\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use cms\Infrastructure\Abstractions\Events\EventAbstract;
use cms\Domain\Users\Roles\Role;

/**
 * Class RoleUpdatedEvent
 * @package cms\Domain\Users\Roles\Events
 */
class RoleUpdatedEvent extends EventAbstract
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
