<?php

namespace App\Admin\Repositories\Projects;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Projects\ProjectRepository;
use App\Admin\Repositories\Projects\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace App\Admin\Repositories\Projects;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
