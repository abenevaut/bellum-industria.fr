<?php namespace abenevaut\Domain\Users\Users\Presenters;

use abenevaut\Infrastructure\Contracts\Presenters\PresenterAbstract;
use abenevaut\Domain\Users\Users\Transformers\AjaxCheckUserEmailTransformer;

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
