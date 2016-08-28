<?php namespace cms\Infrastructure\Abstractions\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface as PrettusCriteriaInterface;

/**
 * Class CriteriaAbstract
 * @package cms\Infrastructure\Abstractions\Criterias
 */
abstract class CriteriaAbstract implements PrettusCriteriaInterface
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
