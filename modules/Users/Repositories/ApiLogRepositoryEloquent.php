<?php namespace Modules\Users\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Users\Repositories\ApiLogRepository;
use Modules\Users\Entities\ApiLog;

/**
 * Class ApiLogRepositoryEloquent
 * @package namespace App\Admin\Repositories\Users;
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
