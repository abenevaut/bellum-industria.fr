<?php

namespace App\CVEPDB\Vitrine\Controllers;

use Illuminate\Routing\Controller as BaseController;

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

    public function contact()
    {
        return view('cvepdb.vitrine.contact');
    }
}