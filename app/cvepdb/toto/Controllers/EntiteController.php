<?php

namespace App\CVEPDB\Vitrine\Controllers\Admin;

use App\CVEPDB\Vitrine\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Vitrine\Models\Entite;
use App\CVEPDB\Vitrine\Requests\EntiteFormRequest;

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

    public function postAddEntite(EntiteFormRequest $request)
    {

        Entite::create([
            'name' => $request->get('name'),
            'siret' => $request->get('siret'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);

        return redirect('admin/entites');
    }

    public function getEditEntite()
    {
        return view('cvepdb.vitrine.admin.entite_edit');
    }

    public function postEditEntite()
    {
        return view('cvepdb.vitrine.admin.entite_edit');
    }
}