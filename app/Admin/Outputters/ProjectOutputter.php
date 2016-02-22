<?php

namespace App\Admin\Outputters;

use CVEPDB\Requests\IFormRequest;
use \App\Admin\Repositories\Projects\ProjectRepositoryEloquent;
use \App\Admin\Repositories\Entites\EntiteRepositoryEloquent;

class ProjectOutputter extends AdminOutputter
{
    /**
     * @var null ProjectRepositoryEloquent
     */
    private $r_project = null;

    /**
     * @var EntiteRepositoryEloquent|null
     */
    private $r_entite = null;

    /**
     * @param ProjectRepositoryEloquent $r_project
     */
    public function __construct(ProjectRepositoryEloquent $r_project, EntiteRepositoryEloquent $r_entite)
    {
        parent::__construct();

        $this->r_project = $r_project;
        $this->r_entite = $r_entite;

//        $projects = GitLab::connection('main')->api('projects')->accessible(true);

        // On veut tous les milestones par project

//        foreach ($projects as $project) {
//
//            var_dump($project['name']);
//
//            var_dump( $milestones = GitLab::connection('main')->api('milestones')->all($project['id']) );
//
//            foreach ($milestones as $milestone) {
//                var_dump(GitLab::connection('main')->api('milestones')->issues($project['id'], $milestone['id']));
//            }
//
//        }
//exit;
//        dd( GitLab::connection('main')->api('projects')->owned(true) );
//        dd( GitLab::connection('main')->api('groups')->all() );
//        dd( GitLab::connection('main')->api('users')->all(true) );



    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $projects = $this->r_project->all();

        return $this->output(
            'cvepdb.admin.projects.index',
            [
                'projects' => $projects
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->output(
            'cvepdb.admin.projects.create',
            [
                'projects_status' => $this->r_project->project_status
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IFormRequest $request
     */
    public function store(IFormRequest $request)
    {
        $project = $this->r_project->record_project(
            $request->get('entite_id'),
            $request->get('name'),
            $request->get('status'),
            $request->get('description')
        );
        return $this->redirectTo('admin/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->r_project->find($id);

        return $this->output(
            'cvepdb.admin.projects.edit',
            [
                'projects_status' => $this->r_project->project_status,
                'project' => $project
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, IFormRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return 'T\'es pas fou! On supprime pas les projets!';
    }
}