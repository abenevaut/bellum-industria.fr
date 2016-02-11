<?php

namespace App\Admin\Repositories\Entites;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Entites\LogEntiteRepository;
use App\Admin\Repositories\Entites\LogEntite;

/**
 * Class LogEntiteRepositoryEloquent
 * @package namespace App\Admin\Repositories\Entites;
 */
class LogEntiteRepositoryEloquent extends BaseRepository implements LogEntiteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LogEntite::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
