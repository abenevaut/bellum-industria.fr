<?php namespace Modules\Users\Presenters;

use Modules\Users\Transformers\UsersAdminExcelTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UsersAdminExcelPresenter
 *
 * @package namespace App\Repositories;
 */
class UsersAdminExcelPresenter extends FractalPresenter
{
	/**
	 * Transformer
	 *
	 * @return \League\Fractal\TransformerAbstract
	 */
	public function getTransformer()
	{
		return new UsersAdminExcelTransformer();
	}
}
