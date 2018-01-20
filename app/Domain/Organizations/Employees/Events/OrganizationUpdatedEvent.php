<?php

namespace bellumindustria\Domain\Organizations\Employees\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Organizations\Employees\Organization;

class OrganizationUpdatedEvent extends EventAbstract
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
