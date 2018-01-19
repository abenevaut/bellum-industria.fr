<?php

namespace bellumindustria\Domain\Users\Users\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Users\Users\User;

class UserDeletedEvent extends EventAbstract
{

	/**
	 * @var User|null
	 */
	public $lead = null;

	/**
	 * UserUpdatedEvent constructor.
	 *
	 * @param User $lead
	 */
	public function __construct(User $lead)
	{
		$this->lead = $lead;
	}
}
