<?php namespace cms\Domain\Users\Roles\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use cms\Domain\Users\Roles\Transformers\RoleListTransformer;

/**
 * Class RoleListPresenter
 * @package cms\Domain\Users\Roles\Presenters
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
