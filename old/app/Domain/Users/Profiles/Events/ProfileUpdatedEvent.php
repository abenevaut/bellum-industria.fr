<?php

namespace bellumindustria\Domain\Users\Profiles\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Users\Profiles\Profile;

class ProfileUpdatedEvent extends EventAbstract
{

	/**
	 * @var Profile|null
	 */
	public $profile = null;

	/**
	 * UserUpdatedEvent constructor.
	 *
	 * @param Profile $profile
	 */
	public function __construct(Profile $profile)
	{
		$this->profile = $profile;
	}
}
