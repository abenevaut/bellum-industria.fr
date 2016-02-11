<?php

namespace App\Admin\Repositories\Bills;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Bills\BillRepository;
use App\Admin\Repositories\Bills\Bill;

/**
 * Class BillRepositoryEloquent
 * @package namespace App\Admin\Repositories\Bills;
 */
class BillRepositoryEloquent extends BaseRepository implements BillRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bill::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
