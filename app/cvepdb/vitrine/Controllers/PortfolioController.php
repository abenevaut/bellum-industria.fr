<?php

namespace App\CVEPDB\Vitrine\Controllers;

use App\CVEPDB\Vitrine\Controllers\AbsBaseController as BaseController;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class PortfolioController extends BaseController
{
    use EntrustUserTrait;

    public function index()
    {
        return view('cvepdb.vitrine.portfolio.index', ['breadcrumbs' => $this->breadcrumbs]);
    }

    public function view($id = 0)
    {
        return view('cvepdb.vitrine.portfolio.view', ['breadcrumbs' => $this->breadcrumbs]);
    }
}