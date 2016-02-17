<?php

namespace App\Admin\Outputters;

use CVEPDB\Requests\IFormRequest;
use CVEPDB\Repositories\Roles\RoleRepositoryEloquent;
use CVEPDB\Repositories\Permissions\PermissionRepositoryEloquent;

class RoleOutputter extends AdminOutputter
{
    /**
     * @var UserRepositoryEloquent|null
     */
    private $r_role = null;

    /**
     * @var PermissionRepositoryEloquent|null
     */
    private $r_permission = null;

    public function __construct(RoleRepositoryEloquent $r_role, PermissionRepositoryEloquent $r_permission)
    {
        parent::__construct();

        $this->r_role = $r_role;
        $this->r_permission = $r_permission;

        $this->addBreadcrumb('Rôles', 'admin/roles');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = $this->r_role->paginate(null, ['*']);

        return $this->output(
            'cvepdb.admin.roles.index',
            [
                'roles' => $roles
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = $this->r_permission->all();

        return $this->output(
            'cvepdb.admin.roles.create',
            [
                'permissions' => $permissions/*->lists('name', 'id')*/
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
        $role = $this->r_role->create([
            'name' => $request->get('name'),
            'display_name' => $request->get('display_name'),
            'description' => $request->get('description')
        ]);

        $permissions = $request->only('role_permission_id');

        if (count($permissions['role_permission_id']) > 0) {
            $role->permissions()->attach($permissions['role_permission_id']);
        }

        return $this->redirectTo('admin/roles');
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
        $role = $this->r_role->find($id);
        $permissions = $this->r_permission->all();

        return $this->output(
            'cvepdb.admin.roles.edit',
            [
                'role' => $role,
                'permissions' => $permissions
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
        $role = $this->r_role->update(
            [
                'name' => $request->get('name'),
                'display_name' => $request->get('display_name'),
                'description' => $request->get('description')
            ],
            $id
        );

        $permissions = $request->only('role_permission_id');

        if (count($permissions['role_permission_id']) > 0) {
            $role->permissions()->detach();
            $role->permissions()->attach($permissions['role_permission_id']);
        }

        return $this->redirectTo('admin/roles');
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