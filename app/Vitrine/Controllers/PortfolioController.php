<?php

namespace App\CVEPDB\Vitrine\Controllers;

use Illuminate\Http\Request as Request;
use CVEPDB\Controllers\AbsBaseController as BaseController;


class PortfolioController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('cvepdb.vitrine.portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('cvepdb.vitrine.portfolio.view');
    }
}