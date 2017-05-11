<?php

namespace panacea\Domain\Users\Users\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Users\Users\User;

class UserDeletedEvent extends EventAbstract
{

	/**
	 * The current user.
	 *
	 * @var integer|null
	 */
	public $user_id = null;

	/**
	 * TrainingDeletedEvent constructor.
	 *
	 * @param integer $training
	 */
	public function __construct($user_id)
	{
		$this->user_id = $user_id;
	}
}
