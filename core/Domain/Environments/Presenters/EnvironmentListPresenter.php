<?php namespace Core\Domain\Environments\Presenters;

use Core\Domain\Environments\Transformers\EnvironmentListTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EnvironmentListPresenter
 * @package Core\Domain\Environments\Presenters
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
