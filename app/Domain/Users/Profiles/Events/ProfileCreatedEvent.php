<?php

namespace bellumindustria\Domain\Users\Profiles\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Users\Profiles\Profile;

class ProfileCreatedEvent extends EventAbstract
{

	/**
	 * @var Profile|null
	 */
	public $profile = null;

	/**
	 * TrainingCreatedEvent constructor.
	 *
	 * @param Profile $training
	 */
	public function __construct(Profile $profile) {
		$this->profile = $profile;
	}
}
