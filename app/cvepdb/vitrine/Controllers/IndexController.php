<?php

namespace App\CVEPDB\Vitrine\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class IndexController extends BaseController
{
    use EntrustUserTrait;

    public function index()
    {

        \Session::flash('message', 'This is a message!');
//        \Session::flash('alert-class', 'info-box');
//        \Session::flash('alert-class', 'download-box');
//        \Session::flash('alert-class', 'warning-box');
        \Session::flash('alert-class', 'note-box');

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