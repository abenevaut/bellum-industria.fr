<?php

namespace App\Admin\Outputters;

use CVEPDB\Requests\IFormRequest;
use CVEPDB\Repositories\Users\UserRepositoryEloquent;
use CVEPDB\Repositories\Roles\RoleRepositoryEloquent;

class UserOutputter extends AdminOutputter
{
    /**
     * @var null UserRepositoryEloquent
     */
    private $r_user = null;

    /**
     * @var RoleRepositoryEloquent|null
     */
    private $r_role = null;

    public function __construct(UserRepositoryEloquent $r_user, RoleRepositoryEloquent $r_role)
    {
        parent::__construct();

        $this->r_user = $r_user;
        $this->r_role = $r_role;

        $this->addBreadcrumb('Utilisateurs', 'admin/users');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->r_user->paginate(null, ['*']);

        return $this->output(
            'cvepdb.admin.users.index',
            [
                'users' => $users
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // On exclue le role user qui est ajoute par defaut
        $roles = $this->r_role->findWhereNotIn('name', ['user']);

        return $this->output(
            'cvepdb.admin.users.create',
            [
                'roles' => $roles
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
        $user = $this->r_user->create_user(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email')
        );

        $roles = $request->only('user_role_id');

        if (count($roles['user_role_id']) > 0) {
            $user->roles()->attach($roles['user_role_id']);
        }

        return $this->redirectTo('admin/users');
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
        $user = $this->r_user->find($id);

        // On exclue le role user qui est ajoute par defaut
        $roles = $this->r_role->findWhereNotIn('name', ['user']);

        return $this->output(
            'cvepdb.admin.users.edit',
            [
                'user' => $user,
                'roles' => $roles
            ]
        );
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
        return 'T\'es pas fou! On supprime pas les utilisateurs!';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function storeClient(IFormRequest $request)
    {
        $user = $this->r_user->create_client(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email')
        );


        /*
         * Todo : Envoyer un mail au contact concerné "Votre compte a été crée sur notre plateforme ... A la premiere utilisation vous devez faire un changement de mot de passe..."
         */


        return $this->redirectTo('admin/users');
    }
}