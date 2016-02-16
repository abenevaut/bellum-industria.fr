<?php

namespace App\Admin\Outputters;

use CVEPDB\Services\Outputters\AbsLaravelOutputter;
use CVEPDB\Requests\IFormRequest;
use CVEPDB\Repositories\Permissions\PermissionRepositoryEloquent;

class PermissionOutputter extends AbsLaravelOutputter
{
    /**
     * @var null PermissionRepositoryEloquent
     */
    private $r_permission = null;

    public function __construct(PermissionRepositoryEloquent $r_permission)
    {
        parent::__construct();

        $this->r_permission = $r_permission;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $permissions = $this->r_permission->paginate(null, ['*']);

        return $this->output(
            'cvepdb.admin.permissions.index',
            [
                'permissions' => $permissions
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->output(
            'cvepdb.admin.permissions.create',
            [
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
        $this->r_permission->create([
            'name' => $request->get('name'),
            'display_name' => $request->get('display_name'),
            'description' => $request->get('description')
        ]);
        return redirect('admin/permissions');
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
        $permission = $this->r_permission->find($id);

        return $this->output(
            'cvepdb.admin.permissions.edit',
            [
                'permission' => $permission
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
        $this->r_permission->update(
            [
                'name' => $request->get('name'),
                'display_name' => $request->get('display_name'),
                'description' => $request->get('description')
            ],
            $id
        );
        return redirect('admin/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->r_permission->find($id);

        if ($permission->roles->count() === 0) {
            $this->r_permission->delete($id);
        }
        else {
            // Todo : Message "Pas de suppression car cette permission est utilisés par des rôles. (+ liste des rôles)"
        }
        return redirect('admin/permissions');
    }

    public function ajax_permissions()
    {
        return ['results' => $this->r_permission->all()];
    }
}