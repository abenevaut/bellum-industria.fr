<?php

namespace App\CVEPDB\Vitrine\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class PortfolioController extends BaseController
{
    use EntrustUserTrait;

    public function index()
    {
        return view('cvepdb.vitrine.portfolio.index');
    }

    public function view($id = 0)
    {
        return view('cvepdb.vitrine.portfolio.view');
    }
}