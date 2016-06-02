<?php namespace Core\Domain\Users\Presenters;

use Core\Domain\Users\Transformers\UserListTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserListPresenter
 * @package Core\Domain\Users\Presenters
 */
class UserListPresenter extends FractalPresenter
{

	/**
	 * Transformer.
	 *
	 * @return UserListTransformer
	 */
	public function getTransformer()
	{
		return new UserListTransformer();
	}
}
