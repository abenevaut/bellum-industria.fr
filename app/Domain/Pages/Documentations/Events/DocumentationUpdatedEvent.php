<?php

namespace bellumindustria\Domain\Pages\Documentations\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Pages\Documentations\Documentation;

class DocumentationUpdatedEvent extends EventAbstract
{

	/**
	 * @var null|Documentation
	 */
	public $documentation = null;

	/**
	 * DocumentationUpdatedEvent constructor.
	 *
	 * @param Documentation $documentation
	 */
	public function __construct(Documentation $documentation)
	{
		$this->contact = $documentation;
	}
}
