<?php namespace Modules\Users\Presenters;

use Modules\Users\Transformers\UserAdminExcelTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UsersAdminExcelPresenter
 *
 * @package namespace App\Repositories;
 */
class UserAdminExcelPresenter extends FractalPresenter
{
	/**
	 * Transformer
	 *
	 * @return \League\Fractal\TransformerAbstract
	 */
	public function getTransformer()
	{
		return new UserAdminExcelTransformer();
	}
}
