<?php

namespace bellumindustria\Domain\Users\Leads\Presenters;

use bellumindustria\Infrastructure\Contracts\Presenters\PresenterAbstract;
use bellumindustria\Domain\Users\Leads\Transformers\LeadsListTransformer;

class LeadsListPresenter extends PresenterAbstract
{

	/**
	 * Transformer
	 *
	 * @return \League\Fractal\TransformerAbstract
	 */
	public function getTransformer()
	{
		return new LeadsListTransformer();
	}
}
