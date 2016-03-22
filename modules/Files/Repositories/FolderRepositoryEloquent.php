<?php

namespace Modules\Files\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Files\Repositories\FolderRepository;
use Modules\Files\Entities\Folder;

/**
 * Class FolderRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FolderRepositoryEloquent extends BaseRepository implements FolderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Folder::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
