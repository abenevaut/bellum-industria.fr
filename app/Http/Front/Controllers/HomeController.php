<?php

namespace App\Http\Front\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Contracts\Controllers\Controller;

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

        dd( \Module::collections() );

        //return view('front.home');
    }
}
