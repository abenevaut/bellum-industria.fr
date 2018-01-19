<?php

namespace bellumindustria\Domain\Users\Leads\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Users\Leads\Lead;

class LeadCreatedEvent extends EventAbstract
{

	/**
	 * @var Lead|null
	 */
	public $lead = null;

	/**
	 * LeadUpdatedEvent constructor.
	 *
	 * @param Lead $lead
	 */
	public function __construct(Lead $lead)
	{
		$this->lead = $lead;
	}
}
