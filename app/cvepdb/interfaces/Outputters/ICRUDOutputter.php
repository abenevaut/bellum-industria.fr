<?php

namespace App\CVEPDB\Interfaces\Outputters;

use App\CVEPDB\Interfaces\Requests\IFormRequest;

interface ICRUDOutputter
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index();

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create();

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(IFormRequest $request);

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id);

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id);

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, IFormRequest $request);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id);

}