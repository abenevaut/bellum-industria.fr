<?php namespace cms\Domain\Users\ApiLogs\Repositories;

use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
use cms\Domain\Users\ApiLogs\Repositories\ApiLogsRepository;
use cms\Domain\Users\ApiLogs\ApiLog;

/**
 * Class ApiLogsRepositoryEloquent
 * @package cms\Domain\Users\ApiLogs\Repositories
 */
class ApiLogsRepositoryEloquent extends RepositoryEloquentAbstract implements ApiLogsRepository
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

}
