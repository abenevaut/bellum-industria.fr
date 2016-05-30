<?php namespace Modules\Users\Events;

use Core\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Modules\Users\Entities\User;

/**
 * Class UserCreatedEvent
 * @package Modules\Users\Events
 */
class UserCreatedEvent extends Event
{
	use SerializesModels;

	public $user = null;

	/**
	 * Create a new event instance.
	 *
	 * @return void
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
