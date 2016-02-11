<?php

namespace App\Admin\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use App\Admin\Outputters\ProjectOutputter;
use App\Admin\Requests\ProjectFormRequest;

class ProjectController extends Controller
{
    /**
     * @var ProjectOutputter|null
     */
    protected $outputter = null;

    /**
     * @param ProjectOutputter $outputter
     */
    public function __construct(ProjectOutputter $outputter)
    {
        parent::__construct();

        $this->outputter = $outputter;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->outputter->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return $this->outputter->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectFormRequest $request)
    {
        return $this->outputter->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->outputter->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->outputter->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ProjectFormRequest $request)
    {
        return $this->outputter->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return $this->outputter->destroy($id);
    }
}
