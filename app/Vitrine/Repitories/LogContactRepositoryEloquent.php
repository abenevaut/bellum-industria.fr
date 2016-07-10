<?php

namespace App\Admin\Repositories\Users;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Users\LogContactRepository;
use App\Admin\Repositories\Users\LogContact;

/**
 * Class LogContactRepositoryEloquent
 * @package namespace App\Admin\Repositories\Users;
 */
class LogContactRepositoryEloquent extends BaseRepository implements LogContactRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LogContact::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
