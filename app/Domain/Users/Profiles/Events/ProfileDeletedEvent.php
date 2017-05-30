<?php

namespace panacea\Domain\Users\Users\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Users\Profiles\Profile;

class ProfileDeletedEvent extends EventAbstract
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
