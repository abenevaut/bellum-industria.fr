<?php namespace cms\Domain\Users\ApiLogs\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use cms\Domain\Users\ApiLogs\Repositories\ApiLogRepository;
use cms\Domain\Users\ApiLogs\ApiLog;

/**
 * Class ApiLogRepositoryEloquent
 * @package Core\Domain\Users\Repositories
 */
class ApiLogRepositoryEloquent extends BaseRepository implements ApiLogRepository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return ApiLog::class;
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}
}
