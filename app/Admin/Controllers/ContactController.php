<?php

namespace App\Admin\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use Illuminate\Http\Request as Request;

use App\Admin\Outputters\ContactOutputter;

class ContactController extends Controller
{
    /**
     * @var null Contact outputter
     */
    private $outputter = null;

    public function __construct(ContactOutputter $outputter)
    {
        die('test');
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