<?php

namespace App\Client\Outputters;

use App;
use CVEPDB\Services\Outputters\AbsLaravelOutputter;
use App\Admin\Repositories\Projects\ProjectRepositoryEloquent;

class ClientOutputter extends AbsLaravelOutputter
{
    /**
     * @var ProjectRepositoryEloquent|null
     */
    private $r_project = null;

    /***
     * @var EntiteRepositoryEloquent|null
     */
    private $r_entite = null;

    /**
     * @var UserRepositoryEloquent|null
     */
    private $r_user = null;

    public function __construct()
    {
        parent::__construct();

        $this->r_project = App::make('App\Admin\Repositories\Projects\ProjectRepositoryEloquent');
        $this->r_entite = App::make('App\Admin\Repositories\Entites\EntiteRepositoryEloquent');
        $this->r_user = App::make('App\Admin\Repositories\Users\UserRepositoryEloquent');

        $this->addBreadcrumb('Dashboard', 'clients/');
        $this->setBreadcrumbDivider('');
        $this->breadcrumbs->setListElement('li');
    }

    public function output($view, $data)
    {
        return parent::output(
            $view,
            $data + $this->client_data_sidebar()
        );
    }

    private function client_data_sidebar()
    {
        $projects = null;
        foreach ($this->r_user->find(\Auth::user()->id)->entites as $entite) {

            if (is_null($projects)) {
                $projects = $entite->projects;
            } else {
                $projects->merge($entite->projects);
            }
        }

        return [
            'sidebar' => [
                'projects' => $projects
            ]
        ];
    }
}