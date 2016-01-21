<?php

namespace App\CVEPDB\Vitrine\Controllers\Admin;

use App\CVEPDB\Vitrine\Controllers\Abs\AbsController as Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('cvepdb.vitrine.admin.index');
    }
}