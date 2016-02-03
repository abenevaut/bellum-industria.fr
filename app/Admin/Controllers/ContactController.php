<?php

namespace App\CVEPDB\Admin\Controllers;

use App\CVEPDB\Admin\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Interfaces\Controllers\ICRUDRessourceController as CRUD;
use Illuminate\Http\Request as Request;

use App\CVEPDB\Admin\Outputters\ContactOutputter;

class ContactController extends Controller implements CRUD
{
    /**
     * @var null Contact outputter
     */
    private $outputter = null;

    public function __construct(ContactOutputter $outputter)
    {
        $this->outputter = $outputter;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->outputter->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
    public function update($id)
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
        //
    }

    /**
     * Show the form for creating a new client.
     *
     * @param $id
     * @return mixed
     */
    public function createClient($id)
    {
        return $this->outputter->createClient($id);
    }
}