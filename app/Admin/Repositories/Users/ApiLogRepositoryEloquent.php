<?php

namespace App\Admin\Repositories\Users;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Users\ApiLogRepository;
use App\Admin\Repositories\Users\ApiLog;

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
