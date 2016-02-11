<?php

namespace App\Admin\Repositories\Documents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Documents\DocumentRepository;
use App\Admin\Repositories\Documents\Document;

/**
 * Class DocumentRepositoryEloquent
 * @package namespace App\Admin\Repositories\Documents;
 */
class DocumentRepositoryEloquent extends BaseRepository implements DocumentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Document::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
