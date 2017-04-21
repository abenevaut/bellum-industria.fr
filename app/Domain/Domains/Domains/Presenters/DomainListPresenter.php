<?php namespace cms\Domain\Domains\Domains\Presenters;

use cms\Domain\Domains\Domains\Transformers\DomainListTransformer;
use cms\Infrastructure\Abstractions\Presenters\FractalPresenterAbstract;

class DomainListPresenter extends FractalPresenterAbstract
{

	/**
	 * Transformer.
	 *
	 * @return DomainListTransformer
	 */
	public function getTransformer() {
		return new DomainListTransformer();
	}
}
