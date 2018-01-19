<?php

namespace abenevaut\Domain\Users\Users\Events;

use abenevaut\Infractucture\Contracts\Events\EventAbstract;
use abenevaut\Domain\Users\Users\User;

class UserUpdatedEvent extends EventAbstract
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
