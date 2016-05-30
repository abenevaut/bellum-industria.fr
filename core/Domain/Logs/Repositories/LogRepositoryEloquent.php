<?php namespace Core\Domain\Logs\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Core\Domain\Logs\Entities\Log;
use Core\Validators\LogValidator;

/**
 * Class LogRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LogRepositoryEloquent extends BaseRepository implements LogRepository
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
