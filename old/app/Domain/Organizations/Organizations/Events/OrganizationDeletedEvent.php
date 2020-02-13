<?php

namespace bellumindustria\Domain\Organizations\Organizations\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Organizations\Organizations\Organization;

class OrganizationDeletedEvent extends EventAbstract
{

	/**
	 * @var null|Organization
	 */
	public $organization = null;

	/**
	 * organizationCreatedEvent constructor.
	 *
	 * @param Organization $organization
	 */
	public function __construct(Organization $organization)
	{
		$this->organization = $organization;
	}
}
