<?php namespace App\Http\Front\Controllers;

use CVEPDB\Controllers\AbsBaseController as Controller;

class InstallerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return 'installer';
    }
}