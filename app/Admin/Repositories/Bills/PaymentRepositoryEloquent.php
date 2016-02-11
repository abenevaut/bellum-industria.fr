<?php

namespace App\Admin\Repositories\Bills;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Bills\PaymentRepository;
use App\Admin\Repositories\Bills\Payment;

/**
 * Class PaymentRepositoryEloquent
 * @package namespace App\Admin\Repositories\Bills;
 */
class PaymentRepositoryEloquent extends BaseRepository implements PaymentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Payment::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
