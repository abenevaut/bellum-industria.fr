<?php namespace cms\Domain\Logs\Logs\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
use cms\Domain\Logs\Logs\Log;

/**
 * Class LogRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LogRepositoryEloquent extends RepositoryEloquentAbstract implements LogRepository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Log::class;
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}
}
