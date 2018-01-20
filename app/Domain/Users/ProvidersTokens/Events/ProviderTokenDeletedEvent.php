<?php

namespace bellumindustria\Domain\Users\ProvidersTokens\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Users\ProvidersTokens\ProviderToken;

class ProviderTokenDeletedEvent extends EventAbstract
{

	/**
	 * @var ProviderToken|null
	 */
	public $provider_token = null;

	/**
	 * ProviderTokenUpdatedEvent constructor.
	 *
	 * @param ProviderToken $provider_token
	 */
	public function __construct(ProviderToken $provider_token)
	{
		$this->provider_token = $provider_token;
	}
}
