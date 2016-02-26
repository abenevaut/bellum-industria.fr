<?php

namespace App\Admin\Repositories\Projects;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\Projects\ProjectRepository;
use App\Admin\Repositories\Projects\Milestone;
use App\Admin\Repositories\Projects\Project;
use Vinkla\GitLab\Facades\GitLab;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace App\Admin\Repositories\Projects;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    const DRAF = 'draft';
    const WAITING_ADVANCE_PAYMENT = 'waiting_advance_payment';
    const DEVELOPMENT = 'development';
    const TEST = 'test';
    const WAINTING_PAYMENT = 'waiting_payment';
    const DELIVERED = 'delivered';

    const GITLAB_NAMESPACE_CVEPDB_PROJECTS = 'cvepdb-projects';
    const GITLAB_NAMESPACE_CVEPDB_KIND = 'group';

    protected $gitlab_namespace_cvepdb_project_id = 0;

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

        /*
         * Todo : Mise en cache
         */

        $gitlab_namespaces = GitLab::connection('main')->api('namespaces')->search(self::GITLAB_NAMESPACE_CVEPDB_PROJECTS);

        foreach ($gitlab_namespaces as $namespace) {
            if (
                array_key_exists('kind', $namespace)
                && array_key_exists('path', $namespace)
                && array_key_exists('id', $namespace)
                && !strcmp($namespace['kind'], self::GITLAB_NAMESPACE_CVEPDB_KIND)
                && !strcmp($namespace['path'], self::GITLAB_NAMESPACE_CVEPDB_PROJECTS)
            ) {
                $this->gitlab_namespace_cvepdb_project_id = $namespace['id'];
            }
        }

    }

    /**
     * @param $entite_id
     * @param $name
     * @param $status
     * @param string $description
     * @return mixed
     */
    public function record_project($entite_id, $name, $status, $milestones_dates, $description = '')
    {
        // DB record
        $project = $this->create([
            'name' => $name,
            'entite_id' => $entite_id,
            'status' => $status,
        ]);

        // Gitlab record
        $gitlab_project = $this->gitlab_record_project($name, $description);
        $gitlab_project_milestones = $this->gitlab_record_project_milestones($gitlab_project, $milestones_dates);

        $project->gitlab_project_id = $gitlab_project['id'];
        $project->save();

        foreach ($gitlab_project_milestones as $milestone) {
            Milestone::create([
                'project_id' => $project->gitlab_project_id,
                'gitlab_milestone_id' => $milestone['id'],
                'due_date' => $milestone['due_date'],
            ]);
        }

        // Todo : event new project

        return $project;
    }

    /**
     * @param $id
     * @param $params
     * @return mixed
     */
    public function update_project($id, $params)
    {
        $project = $this->find($id);

        // Todo : event project update

        return $project;
    }

    public function end_project($id)
    {
        $project = $this->find($id);
        $project->status = self::DELIVERED;
        $project->ended_at = date('Y-m-d');
        $project->save();

        // Todo : event project ended
    }

    private function gitlab_record_project($name, $description)
    {
        $project = GitLab::connection('main')->api('projects')->create(
            $name,
            [
                'description' => $description,
                'issues_enabled' => true,
                'merge_requests_enabled' => false,
                'builds_enabled' => true,
                'wiki_enabled' => true,
                'snippets_enabled' => false,
                'public' => false,
                'public_builds' => false,
                'namespace_id' => $this->gitlab_namespace_cvepdb_project_id,
                //                'path' => '',
                //                'visibility_level' => '',
                //                'import_url' => '',
            ]
        );
        return $project;
    }

    private function gitlab_record_project_milestones($project, $milestones_dates)
    {
        $milestones = [];
        foreach ($milestones_dates as $due_date) {
            $milestone = GitLab::connection('main')->api('milestones')->create(
                $project['id'],
                [
                    'title' => '['.$due_date.'] ' . $project['name'],
                    'description' => $project['description'],
                    'due_date' => $due_date
                ]
            );
            array_push($milestones, $milestone);
        }
        return $milestones;
    }
}
