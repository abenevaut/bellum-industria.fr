<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\Abs\AbsController as Controller;
use Illuminate\Http\Request as Request;

use App\CVEPDB\Admin\Outputters\BankAccountOutputter;

class BankAccountController extends Controller
{
    private $outputter = null;

    public function __construct(BankAccountOutputter $outputter)
    {
        parent::__construct();

        $this->outputter = $outputter;
    }

    public function index()
    {
        return $this->outputter->index();
    }

    public function create()
    {
        return $this->outputter->create();
    }

    public function store(Request $request)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
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

    public function postAjaxGetBankAccount()
    {
        return $this->outputter->postAjaxGetBankAccount();
    }
}