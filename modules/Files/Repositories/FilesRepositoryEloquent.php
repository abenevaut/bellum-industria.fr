<?php namespace Modules\Files\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Files\Repositories\FilesRepository;
use Modules\Files\Entities\Files;

/**
 * Class FilesRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FilesRepositoryEloquent extends BaseRepository implements FilesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Files::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
