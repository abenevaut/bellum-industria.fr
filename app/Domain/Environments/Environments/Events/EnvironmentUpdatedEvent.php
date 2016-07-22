<?php namespace cms\Domain\Environments\Environments\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use cms\Infrastructure\Abstractions\Events\EventAbstract;
use Core\Domain\Environments\Entities\Environment;

/**
 * Class EnvironmentUpdatedEvent
 * @package cms\Domain\Environments\Environments\Events
 */
class EnvironmentUpdatedEvent extends EventAbstract
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
