<?php

namespace bellumindustria\Domain\Users\Users\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Users\Users\User;

class UserUpdatedEvent extends EventAbstract
{

	/**
	 * The current user.
	 *
	 * @var User|null
	 */
	public $user = null;

	/**
	 * TrainingCreatedEvent constructor.
	 *
	 * @param User $training
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}
}
