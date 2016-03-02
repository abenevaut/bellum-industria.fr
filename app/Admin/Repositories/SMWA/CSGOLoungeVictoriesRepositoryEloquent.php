<?php

namespace App\Admin\Repositories\SMWA;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\SMWA\CSGOLoungeVictoriesRepository;
use App\Admin\Repositories\SMWA\CSGOLoungeVictories;

/**
 * Class CSGOLoungeVictoriesRepositoryEloquent
 * @package namespace App\Admin\Repositories\SMWA;
 */
class CSGOLoungeVictoriesRepositoryEloquent extends BaseRepository implements CSGOLoungeVictoriesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CSGOLoungeVictories::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
