<?php

namespace bellumindustria\Domain\Projects\Projects\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Projects\Projects\Project;

class ProjectCreatedEvent extends EventAbstract
{

	/**
	 * @var null|Project
	 */
	public $project = null;

	/**
	 * projectCreatedEvent constructor.
	 *
	 * @param Project $project
	 */
	public function __construct(Project $project)
	{
		$this->project = $project;
	}
}
