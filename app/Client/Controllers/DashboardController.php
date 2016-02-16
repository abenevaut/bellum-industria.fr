<?php

namespace App\Client\Controllers;

use CVEPDB\Controllers\AbsController as Controller;


class DashboardController extends Controller
{
    public function index()
    {

        // Est ce que le client est liee a une entite ?
        // -> redirect vers choix entité / création

        if (\Auth::user()->entites->total() == 0) {
            redirect('users/join-entite');
        }


        // Est ce que le client a un projet ?

    }
}