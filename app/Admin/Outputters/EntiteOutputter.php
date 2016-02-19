<?php

namespace App\Admin\Outputters;

use Request;
use CVEPDB\Requests\IFormRequest;
use App\Admin\Repositories\Entites\EntiteRepositoryEloquent;
use App\Admin\Repositories\Users\UserRepositoryEloquent;
use CVEPDB\Repositories\Roles\RoleRepositoryEloquent;

class EntiteOutputter extends AdminOutputter
{
    /**
     * @var EntiteRepositoryEloquent|null
     */
    private $r_entite = null;

    /**
     * @var UserRepositoryEloquent|null
     */
    private $r_user = null;

    /**
     * @var UserRepositoryEloquent|null
     */
    private $r_role = null;

    public function __construct(
        EntiteRepositoryEloquent $r_entite,
        UserRepositoryEloquent $r_user,
        RoleRepositoryEloquent $r_role
    )
    {
        parent::__construct();

        $this->r_entite = $r_entite;
        $this->r_user = $r_user;
        $this->r_role = $r_role;

        $this->addBreadcrumb('Entreprises', 'admin/entites');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $entites = $this->r_entite->all();

        return $this->output(
            'cvepdb.admin.entites.index',
            [
                'entites' => $entites
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users_by_role = $this->r_role->findWhereIn('name', ['client', 'accounting']);

        $users_ids = [];

        foreach ($users_by_role as $role) {
            $users_ids = array_merge($users_ids, $role->users()->lists('id', 'id')->toArray());
        }

        $users = $this->r_user->findWhereIn('id', $users_ids);

        return $this->output(
            'cvepdb.admin.entites.create',
            [
                'users' => $users
            ]
        );
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
        $entite = $this->r_entite->create([
            'name' => $request->get('name'),
            'siret' => $request->get('siret'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),

            'address' => $request->get('address'),
            'zipcode' => $request->get('zipcode'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),

            'type' => $request->get('type'),
            'status' => $request->get('status'),
        ]);

        $users = $request->only('users');

        if (count($users['users']) > 0) {
            $entite->users()->attach($users['users']);
        }

        return $this->redirectTo('admin/entites');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $entite = $this->r_entite->find($id);
        $statistiques = ['projects_status' => []];

        foreach ($entite->projects as $project) {
            if (!array_key_exists($project->status, $statistiques['projects_status'])) {
                $statistiques['projects_status'][$project->status] = 0;
            }
            $statistiques['projects_status'][$project->status] += 1;
        }

        return $this->output(
            'cvepdb.admin.entites.show',
            [
                'entite' => $entite,
                'statistiques' => $statistiques
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $entite = $this->r_entite->find($id);

        $users_by_role = $this->r_role->findWhereIn('name', ['client', 'accounting']);

        $users_ids = [];

        foreach ($users_by_role as $role) {
            $users_ids = array_merge($users_ids, $role->users()->lists('id', 'id')->toArray());
        }

        $users = $this->r_user->findWhereIn('id', $users_ids);

        return $this->output(
            'cvepdb.admin.entites.edit',
            [
                'entite' => $entite,
                'users' => $users
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, IFormRequest $request)
    {
        $entite = $this->r_entite->update(
            [
                'name' => $request->get('name'),
                'siret' => $request->get('siret'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),

                'address' => $request->get('address'),
                'zipcode' => $request->get('zipcode'),
                'city' => $request->get('city'),
                'country' => $request->get('country'),

                'type' => $request->get('type'),
                'status' => $request->get('status'),
            ],
            $id
        );

        $users = $request->only('users');
        $entite->users()->detach();

        if (count($users['users']) > 0) {
            $entite->users()->attach($users['users']);
        }

        return $this->redirectTo('admin/entites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function postAjaxGetVendorsEntites()
    {
        $entites_vendor = [];

        if (Request::ajax()) {
            $entites_vendor = $this->r_entite->findWhere(
                [
                    'type' => 'cvepdb',
                    'status' => 'active'
                ]
            );
        }
        return ['results' => $entites_vendor];
    }

    public function postAjaxGetClientsEntites()
    {
        $entites_client = [];

        if (Request::ajax()) {
            $entites_client = $this->r_entite->findWhere(
                [
                    'type' => 'client',
                    'status' => 'active'
                ]
            );
        }
        return ['results' => $entites_client];
    }
}