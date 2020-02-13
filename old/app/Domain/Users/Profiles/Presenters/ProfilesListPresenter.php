<?php

namespace bellumindustria\Domain\Users\Profiles\Presenters;

use bellumindustria\Infrastructure\Contracts\Presenters\PresenterAbstract;
use bellumindustria\Domain\Users\Profiles\Transformers\ProfilesListTransformer;

class ProfilesListPresenter extends PresenterAbstract
{

	/**
	 * Transformer
	 *
	 * @return \League\Fractal\TransformerAbstract
	 */
	public function getTransformer()
	{
		return new ProfilesListTransformer();
	}
}
