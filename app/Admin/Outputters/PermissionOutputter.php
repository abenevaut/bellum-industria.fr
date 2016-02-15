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
        $permissions = $this->r_permission->all();

        return $this->output(
            'cvepdb.admin.permissions.create',
            [
                'permissions' => $permissions
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

    public function ajax_permissions()
    {
        return ['results' => $this->r_permission->all()];
    }
}