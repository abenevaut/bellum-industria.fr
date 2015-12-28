<?php

namespace App\CVEPDB\Vitrine\Controllers;

use App\CVEPDB\Interfaces\Controllers\AbsBaseController as BaseController;

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

        return view('cvepdb.vitrine.index', ['breadcrumbs' => $this->breadcrumbs]);
    }

    public function services()
    {
        $this->breadcrumbs->addCrumb('Services', '/services');
        return view('cvepdb.vitrine.services', ['breadcrumbs' => $this->breadcrumbs]);
    }

    public function about()
    {
        $this->breadcrumbs->addCrumb('About', '/about');
        return view('cvepdb.vitrine.about', ['breadcrumbs' => $this->breadcrumbs]);
    }

    public function boutique()
    {
        $this->breadcrumbs->addCrumb('Boutique', '/boutique');
        return view('cvepdb.vitrine.boutique', ['breadcrumbs' => $this->breadcrumbs]);
    }
}