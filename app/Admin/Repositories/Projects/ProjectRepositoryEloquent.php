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
    public $project_status = [
        'draft' => 'Brouillon',
        'waiting_advance_payment' => 'En attente du versement de l\'acompte',
        'development' => 'En cours de developement',
        'test' => 'Tests et assurance qualité',
        'waiting_payment' => 'Attente du paiement',
        'delivered' => 'Livraison effectué'
    ];

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
