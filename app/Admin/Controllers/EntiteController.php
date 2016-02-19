<?php

namespace App\Admin\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use App\Admin\Outputters\EntiteOutputter;
use App\Admin\Requests\EntiteFormRequest;

class EntiteController extends Controller
{
    /**
     * @var EntiteRepositoryEloquent|null
     */
    private $outputter = null;

    public function __construct(EntiteOutputter $outputter)
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
     * @param EntiteFormRequest $request
     *
     * @return Response
     */
    public function store(EntiteFormRequest $request)
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
    public function update($id, EntiteFormRequest $request)
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

    public function postAjaxGetVendorsEntites()
    {
        return $this->outputter->postAjaxGetVendorsEntites();
    }

    public function postAjaxGetClientsEntites()
    {
        return $this->outputter->postAjaxGetClientsEntites();
    }
}