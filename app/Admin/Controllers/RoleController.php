<?php

namespace App\Admin\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use App\Admin\Outputters\RoleOutputter;
use App\Admin\Requests\RoleFormRequest;

class RoleController extends Controller
{
    /**
     * @var UserRepository|null
     */
    protected $outputter = null;

    /**
     * @param UserOutputter $outputter
     */
    public function __construct(RoleOutputter $outputter)
    {
        parent::__construct();

        $this->outputter = $outputter;
    }

    public function index()
    {
        return $this->outputter->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->outputter->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(RoleFormRequest $request)
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
        return $this->outputter->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, RoleFormRequest $request)
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
        //
    }
}