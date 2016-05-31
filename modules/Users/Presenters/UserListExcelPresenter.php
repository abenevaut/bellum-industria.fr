<?php namespace Modules\Users\Presenters;

use Modules\Users\Transformers\UserListExcelTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UsersAdminExcelPresenter
 *
 * @package namespace App\Repositories;
 */
class UserListExcelPresenter extends FractalPresenter
{
	/**
	 * Transformer
	 *
	 * @return \League\Fractal\TransformerAbstract
	 */
	public function getTransformer()
	{
		return new UserListExcelTransformer();
	}
}
