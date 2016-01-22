<?php

namespace App\CVEPDB\Admin\Controllers;

use App\CVEPDB\Admin\Controllers\Abs\AbsController as Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('cvepdb.admin.dashboard.index');
    }
}