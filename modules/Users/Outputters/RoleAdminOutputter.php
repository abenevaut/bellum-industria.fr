<?php namespace Modules\Users\Outputters;

use Config;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;
use Modules\Users\Repositories\RoleRepositoryEloquent;
use Modules\Users\Repositories\PermissionRepositoryEloquent;

class RoleAdminOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'users::roles.meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'users::roles.meta_description';

    /**
     * @var RoleRepositoryEloquent|null
     */
    private $r_role = null;

    /**
     * @var PermissionRepositoryEloquent|null
     */
    private $r_permission = null;

    public function __construct(
        RoleRepositoryEloquent $r_role,
        PermissionRepositoryEloquent $r_permission
    )
    {
        parent::__construct();

        $this->set_current_module('users');

        $this->r_role = $r_role;
        $this->r_permission = $r_permission;

        $this->addBreadcrumb('Users', 'users');
        $this->addBreadcrumb('Roles', 'roles');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = $this->r_role->paginate(config('app.pagination'));

        return $this->output(
            'users.admin.roles.index',
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
            'users.admin.roles.create',
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
        $role = $this->r_role->create([
            'name' => $request->get('name'),
            'display_name' => trim($request->get('display_name')),
            'description' => $request->get('description'),
            'unchangeable' => false
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->r_role->find($id);
        $permissions = $this->r_permission->all();

        return $this->output(
            'users.admin.roles.edit',
            [
                'role' => $role,
                'permissions' => $permissions
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
        $role = $this->r_role->update([
            'name' => $request->get('name'),
            'display_name' => trim($request->get('display_name')),
            'description' => $request->get('description'),
            'unchangeable' => false
        ], $id);

        $permissions = $request->only('role_permission_id');
        $role->permissions()->detach();

        if (count($permissions['role_permission_id']) > 0) {
            $role->permissions()->attach($permissions['role_permission_id']);
        }

        return $this->redirectTo('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return 'T\'es pas fou! On supprime pas les utilisateurs!';
    }
}