<?php namespace bellumindustria\Domain\Users\Users\Presenters;

use bellumindustria\Infrastructure\Contracts\Presenters\PresenterAbstract;
use bellumindustria\Domain\Users\Users\Transformers\AjaxCheckUserEmailTransformer;

class AjaxCheckUserEmailPresenter extends PresenterAbstract
{

	/**
	 * Transformer
	 *
	 * @return \League\Fractal\TransformerAbstract
	 */
	public function getTransformer()
	{
		return new AjaxCheckUserEmailTransformer();
	}
}
