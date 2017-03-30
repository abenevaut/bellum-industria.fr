<?php namespace cms\Domain\Users\Users\Presenters;

use cms\Domain\Users\Users\Transformers\UserListTransformer;
use cms\Infrastructure\Abstractions\Presenters\FractalPresenterAbstract;

/**
 * Class UserListPresenter
 * @package Core\Domain\Users\Presenters
 */
class UserListPresenter extends FractalPresenterAbstract
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
