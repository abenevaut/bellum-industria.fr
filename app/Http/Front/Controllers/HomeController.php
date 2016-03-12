<?php

namespace App\Http\Front\Controllers;

use CVEPDB\Controllers\AbsController as Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        foreach ( \Module::collections() as $module) {

            echo \Module::getModulePath( $module->name ) . '<br>';

        }

        //return view('front.home');
    }
}
