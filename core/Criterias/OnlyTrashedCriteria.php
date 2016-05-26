<?php namespace Core\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Core\Criterias\Criteria as AbsCriteria;

/**
 * Class OnlyTrashedCriteria
 * @package Core\Domain\Users\Criterias
 */
class OnlyTrashedCriteria extends AbsCriteria
{

	/**
	 *
	 */
	public function __construct()
	{
	}

	/**
	 * @param                     $model
	 * @param RepositoryInterface $repository
	 *
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository)
	{
		return $model->onlyTrashed();
	}
}
