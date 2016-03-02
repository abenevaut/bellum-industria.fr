<?php

namespace App\Admin\Repositories\SMWA;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\SMWA\CSGOLoungeMatchesRepository;
use App\Admin\Repositories\SMWA\CSGOLoungeMatches;

/**
 * Class CSGOLoungeMatchesRepositoryEloquent
 * @package namespace App\Admin\Repositories\SMWA;
 */
class CSGOLoungeMatchesRepositoryEloquent extends BaseRepository implements CSGOLoungeMatchesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CSGOLoungeMatches::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
