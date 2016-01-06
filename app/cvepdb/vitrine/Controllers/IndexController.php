<?php

namespace App\CVEPDB\Vitrine\Controllers;

use App\CVEPDB\Interfaces\Controllers\AbsBaseController as BaseController;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class IndexController extends BaseController
{
    use EntrustUserTrait;

    public function index()
    {
        return view('cvepdb.vitrine.index');
    }

    public function services()
    {
        return view('cvepdb.vitrine.services');
    }

    public function about()
    {
        return view('cvepdb.vitrine.about');
    }

    public function boutique()
    {
        return view('cvepdb.vitrine.boutique');
    }
}