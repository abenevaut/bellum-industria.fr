<?php

namespace App\Admin\Repositories\Projects;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Projects\MilestoneRepository;
use App\Admin\Repositories\Projects\Milestone;

/**
 * Class MilestoneRepositoryEloquent
 * @package namespace App\Admin\Repositories\Projects;
 */
class MilestoneRepositoryEloquent extends BaseRepository implements MilestoneRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Milestone::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
