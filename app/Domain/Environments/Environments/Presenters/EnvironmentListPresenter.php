<?php namespace cms\Domain\Environments\Environments\Presenters;

use Core\Domain\Environments\Transformers\EnvironmentListTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EnvironmentListPresenter
 * @package cms\Domain\Environments\Environments\Presenters
 */
class EnvironmentListPresenter extends FractalPresenter
{

	/**
	 * Transformer.
	 *
	 * @return EnvironmentListTransformer
	 */
	public function getTransformer()
	{
		return new EnvironmentListTransformer();
	}
}
