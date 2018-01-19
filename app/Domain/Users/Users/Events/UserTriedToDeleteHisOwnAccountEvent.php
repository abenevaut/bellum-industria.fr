<?php

namespace abenevaut\Domain\Users\Users\Events;

use abenevaut\Infractucture\Contracts\Events\EventAbstract;
use abenevaut\Domain\Users\Users\User;

class UserTriedToDeleteHisOwnAccountEvent extends EventAbstract
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
