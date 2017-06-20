<?php

namespace bellumindustria\Domain\Users\Users\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Users\Users\User;

class UserDeletedEvent extends EventAbstract
{

	/**
	 * @var User|null
	 */
	public $user = null;

	/**
	 * UserDeletedEvent constructor.
	 *
	 * @param User $user
	 */
	public function __construct(User $user) {
		$this->user = $user;
	}
}