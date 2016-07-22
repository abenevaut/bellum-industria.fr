<?php namespace CVEPDB\Abstracts\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface as PrettusCriteriaInterface;

/**
 * Class Criteria
 * @package CVEPDB\Abstracts\CriteriaInterface
 */
abstract class CriteriaInterface implements PrettusCriteriaInterface
{

	/**
	 * Apply criteria in repository.
	 *
	 * @param                            $model
	 * @param PrettusRepositoryInterface $repository
	 *
	 * @return mixed
	 */
	abstract public function apply(
		$model,
		PrettusRepositoryInterface $repository
	);
}
