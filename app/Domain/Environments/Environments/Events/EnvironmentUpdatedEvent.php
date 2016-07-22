<?php namespace Core\Domain\Environments\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Core\Events\Event;
use Core\Domain\Environments\Entities\Environment;

/**
 * Class EnvironmentUpdatedEvent
 * @package Core\Domain\Environments\Events
 */
class EnvironmentUpdatedEvent extends Event
{

	use SerializesModels;

	/**
	 * The current environment.
	 *
	 * @var Environment|null
	 */
	public $environment = null;

	/**
	 * EnvironmentUpdatedEvent constructor.
	 *
	 * @param Environment $environment
	 */
	public function __construct(Environment $environment)
	{
		$this->environment = $environment;
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
