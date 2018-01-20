<?php

namespace bellumindustria\Domain\Pages\Documentations\Events;

use bellumindustria\Domain\Pages\Documentations\Documentation;
use bellumindustria\Infractucture\Contracts\Events\EventAbstract;

class DocumentationDeletedEvent extends EventAbstract
{

	/**
	 * @var null|Documentation
	 */
	public $documentation = null;

	/**
	 * DocumentationDeletedEvent constructor.
	 *
	 * @param Documentation $documentation
	 */
	public function __construct(Documentation $documentation)
	{
		$this->contact = $documentation;
	}
}
