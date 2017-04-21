<?php namespace cms\Domain\Users\Users\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use cms\Infrastructure\Abstractions\Events\EventAbstract;
use cms\Domain\Users\Users\User;

class NewSuperAdminCreatedEvent extends EventAbstract
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
	public function __construct(User $user) {
		$this->user = $user;
	}

	/**
	 * Get the channels the event should be broadcast on.
	 *
	 * @return array
	 */
	public function broadcastOn() {
		return [];
	}
}
