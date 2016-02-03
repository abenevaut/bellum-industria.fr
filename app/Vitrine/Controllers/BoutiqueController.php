<?php

namespace App\CVEPDB\Vitrine\Controllers;

use Illuminate\Http\Request as Request;
use CVEPDB\Controllers\AbsBaseController as BaseController;

class BoutiqueController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('cvepdb.vitrine.boutique');
    }
}