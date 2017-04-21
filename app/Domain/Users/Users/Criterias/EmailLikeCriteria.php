<?php namespace cms\Domain\Users\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use cms\Infrastructure\Abstractions\Criterias\CriteriaAbstract;

class EmailLikeCriteria extends CriteriaAbstract
{

	/**
	 * @var string emails list
	 */
	private $emails = null;

	/**
	 * @param string $emails
	 */
	public function __construct($emails = '') {
		$this->emails = $emails;
	}

	/**
	 * @param                     $model
	 * @param RepositoryInterface $repository
	 *
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository) {
		return $model->where('email', 'LIKE', '%' . $this->emails . '%');
	}
}
