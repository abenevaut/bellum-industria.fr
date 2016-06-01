<?php namespace Core\Domain\Roles\Presenters;

use Core\Domain\Roles\Transformers\RoleListTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RoleListPresenter
 * @package Core\Domain\Roles\Presenters
 */
class RoleListPresenter extends FractalPresenter
{

	/**
	 * Transformer.
	 *
	 * @return RoleListTransformer
	 */
	public function getTransformer()
	{
		return new RoleListTransformer();
	}
}
