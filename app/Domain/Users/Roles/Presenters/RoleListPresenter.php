<?php namespace cms\Core\Domain\Users\Roles\Presenters;

use Core\Domain\Roles\Transformers\RoleListTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RoleListPresenter
 * @package cms\Core\Domain\Roles\Roles\Presenters
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
