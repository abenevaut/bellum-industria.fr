<?php

namespace abenevaut\Domain\Users\Leads\Presenters;

use abenevaut\Infrastructure\Contracts\Presenters\PresenterAbstract;
use abenevaut\Domain\Users\Leads\Transformers\LeadsListTransformer;

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
