<?php

namespace App\Admin\Repositories\Bills;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Bills\BillPartRepository;
use App\Admin\Repositories\Bills\BillPart;

/**
 * Class BillPartRepositoryEloquent
 * @package namespace App\Admin\Repositories\Bills;
 */
class BillPartRepositoryEloquent extends BaseRepository implements BillPartRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BillPart::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
