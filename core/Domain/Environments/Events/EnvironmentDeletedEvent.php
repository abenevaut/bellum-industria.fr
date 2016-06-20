<?php namespace Core\Domain\Environments\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Core\Events\Event;
use Core\Domain\Environments\Entities\Environment;

/**
 * Class EnvironmentDeletedEvent
 * @package Core\Domain\Environments\Events
 */
class EnvironmentDeletedEvent extends Event
{

	use SerializesModels;

	/**
	 * The current user ID.
	 *
	 * @var int
	 */
	public $environment_id = 0;

	/**
	 * EnvironmentDeletedEvent constructor.
	 *
	 * @param int $id
	 */
	public function __construct($id)
	{
		$this->environment_id = $id;
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
