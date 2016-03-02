<?php

namespace App\Admin\Repositories\SMWA;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\SMWA\CSGOLoungeTeamsRepository;
use App\Admin\Repositories\SMWA\CSGOLoungeTeams;

/**
 * Class CSGOLoungeTeamsRepositoryEloquent
 * @package namespace App\Admin\Repositories\SMWA;
 */
class CSGOLoungeTeamsRepositoryEloquent extends BaseRepository implements CSGOLoungeTeamsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CSGOLoungeTeams::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
