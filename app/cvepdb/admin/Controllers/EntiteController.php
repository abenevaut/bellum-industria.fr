<?php

namespace App\CVEPDB\Admin\Controllers;

use App\CVEPDB\Admin\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Admin\Models\Entite;
use App\CVEPDB\Admin\Requests\EntiteFormRequest;

class EntiteController extends Controller
{
    public function index()
    {
        $entites = Entite::paginate(15);

        return view('cvepdb.admin.entites.index', ['entites' => $entites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cvepdb.admin.entites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EntiteFormRequest $request
     *
     * @return Response
     */
    public function store(EntiteFormRequest $request)
    {
        Entite::create([
            'name' => $request->get('name'),
            'siret' => $request->get('siret'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);
        return redirect('admin/entites');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('cvepdb.admin.entites.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, EntiteFormRequest $request)
    {
        $entite = new Entite();
        $entite->findOrFail($id);
        $entite->name = $request->get('name');
        $entite->siret = $request->get('siret');
        $entite->email = $request->get('email');
        $entite->phone = $request->get('naphoneme');
        $entite->save();
        return redirect('admin/entites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}