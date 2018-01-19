<?php

namespace abenevaut\Domain\Users\Users\Presenters;

use abenevaut\Infrastructure\Contracts\Presenters\PresenterAbstract;
use abenevaut\Domain\Users\Users\Transformers\UsersListTransformer;

class UsersListPresenter extends PresenterAbstract
{

	/**
	 * Transformer
	 *
	 * @return \League\Fractal\TransformerAbstract
	 */
	public function getTransformer()
	{
		return new UsersListTransformer();
	}
}
