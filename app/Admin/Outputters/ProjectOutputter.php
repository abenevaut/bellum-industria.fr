<?php

namespace App\Admin\Outputters;

use CVEPDB\Services\Outputters\AbsLaravelOutputter;
use CVEPDB\Requests\IFormRequest;
use \App\Admin\Repositories\Projects\ProjectRepositoryEloquent;

class ProjectOutputter extends AbsLaravelOutputter
{
    /**
     * @var null ProjectRepositoryEloquent
     */
    private $r_project = null;

    /**
     * @param ProjectRepositoryEloquent $r_project
     */
    public function __construct(ProjectRepositoryEloquent $r_project)
    {
       // parent::__construct();

        $this->r_project = $r_project;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $projects = $this->r_project->paginate(null, ['*']);

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
            []
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IFormRequest $request
     */
    public function store(IFormRequest $request)
    {
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
        //
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