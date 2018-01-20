<?php

namespace bellumindustria\Domain\Projects\Folios\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Projects\Folios\Folio;

class FolioUpdatedEvent extends EventAbstract
{

	/**
	 * @var null|Folio
	 */
	public $folio = null;

	/**
	 * folioCreatedEvent constructor.
	 *
	 * @param Folio $folio
	 */
	public function __construct(Folio $folio)
	{
		$this->folio = $folio;
	}
}
