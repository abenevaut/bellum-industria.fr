<?php namespace bellumindustria\Domain\Organizations\Quotes\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Organizations\Quotes\Quote;

class QuoteDeletedEvent extends EventAbstract
{

	/**
	 * @var null|Quote
	 */
	public $quote = null;

	/**
	 * QuoteCreatedEvent constructor.
	 *
	 * @param Quote $quote
	 */
	public function __construct(Quote $quote)
	{
		$this->quote = $quote;
	}
}
