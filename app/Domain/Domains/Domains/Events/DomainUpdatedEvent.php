<?php namespace cms\Domain\Domains\Domains\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use cms\Infrastructure\Abstractions\Events\EventAbstract;
use cms\Domain\Domains\Domains\Domain;

class DomainUpdatedEvent extends EventAbstract
{

	use SerializesModels;

	/**
	 * The current domain.
	 *
	 * @var Domain|null
	 */
	public $domain = null;

	/**
	 * DomainCreatedEvent constructor.
	 *
	 * @param Domain $domain
	 */
	public function __construct(Domain $domain)
	{
		$this->domain = $domain;
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
