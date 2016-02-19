<?php

namespace App\Client\Outputters;

use CVEPDB\Services\Outputters\AbsLaravelOutputter;
use CVEPDB\Requests\IFormRequest;
use App\Admin\Repositories\Users\UserRepositoryEloquent;
use App\Admin\Repositories\Users\LogContactRepositoryEloquent;
use App\Admin\Repositories\Entites\EntiteRepositoryEloquent;

class EntiteOutputter extends AbsLaravelOutputter
{
    /**
     * @var int Current user ID
     */
    private $current_user_id = 0;

    /**
     * @var null UserRepositoryEloquent
     */
    private $r_user = null;

    /**
     * @var LogContactRepositoryEloquent|null
     */
    private $r_logcontact = null;

    /**
     * @var EntiteRepositoryEloquent|null
     */
    private $r_entite = null;

    public function __construct(
        UserRepositoryEloquent $r_user,
        LogContactRepositoryEloquent $r_logcontact,
        EntiteRepositoryEloquent $r_entite
    ) {
        parent::__construct();

        $this->current_user_id = \Auth::user()->id;

        $this->r_user = $r_user;
        $this->r_logcontact = $r_logcontact;
        $this->r_entite = $r_entite;

        // Est ce que le client a un projet ?
        if ($this->r_user->find($this->current_user_id)->entites->count() == 0) {
            return redirect('clients/entites/join');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        /*
         * Todo : en mode multi entite, il faudra faire une recherche par type d'entite "entite mere" de l'utilisateur
         */

        $entite = $this->r_entite->find(
            $this->r_user->find($this->current_user_id)->entites->first()->id
        );

        return $this->output(
            'cvepdb.client.entites.index',
            [
                'user' => $this->r_user->find($this->current_user_id),
                'entite' => $entite
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(IFormRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, IFormRequest $request)
    {
        //
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

    public function join()
    {

        $join_demande = $this->r_logcontact->findWhere(['email' => \Auth::user()->email, 'subject' => 'Demande d\'activation de compte'])->first();

        return $this->output(
            'cvepdb.client.entites.join',
            [
                'bool_demande' => !is_null($join_demande) && $join_demande->count()
            ]
        );
    }
}
