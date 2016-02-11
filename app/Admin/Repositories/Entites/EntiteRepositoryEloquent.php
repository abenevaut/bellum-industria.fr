<?php

namespace App\Admin\Repositories\Entites;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Entites\EntiteRepository;
use App\Admin\Repositories\Entites\Entite;

/**
 * Class EntiteRepositoryEloquent
 * @package namespace App\Admin\Repositories\Entites;
 */
class EntiteRepositoryEloquent extends BaseRepository implements EntiteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Entite::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
