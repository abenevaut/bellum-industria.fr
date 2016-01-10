<?php

namespace App\CVEPDB\Vitrine\Controllers\Admin;

use App\CVEPDB\Vitrine\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Vitrine\Models\Entite;

class EntiteController extends Controller
{
    public function getIndex()
    {
        $entites = Entite::paginate(15);

        return view('cvepdb.vitrine.admin.entite', ['entites' => $entites]);
    }

    public function getAddEntite()
    {
        return view('cvepdb.vitrine.admin.entite_new');
    }
}