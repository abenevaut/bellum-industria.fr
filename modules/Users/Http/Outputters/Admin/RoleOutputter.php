<?php namespace Modules\Users\Http\Outputters\Admin;

use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Core\Domain\Environments\Entities\Environment;
use Core\Domain\Roles\Presenters\RoleListPresenter;
use Core\Domain\Roles\Repositories\PermissionRepositoryEloquent;
use Modules\Users\Repositories\RoleRepositoryEloquent;

/**
 * Class RoleOutputter
 * @package Modules\Users\Http\Outputters\Admin
 */
class RoleOutputter extends AdminOutputter
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
		SettingsRepository $r_settings,
		RoleRepositoryEloquent $r_role,
		PermissionRepositoryEloquent $r_permission
	)
	{

		parent::__construct($r_settings);

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
		$this->r_role->setPresenter(new RoleListPresenter());
		$roles = $this->r_role->with(['permissions'])->paginate(config('app.pagination'));

		return $this->output(
			'users.admin.roles.index',
			[
				'roles' => $roles
			]
		);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
	 * @param IFormRequest $request
	 *
	 * @return mixed|\Redirect
	 */
	public function store(IFormRequest $request)
	{
		/*
		 * Create the new role for the current environment
		 */

		$role = $this->r_role->create([
			'name'         => $request->get('name'),
			'display_name' => trim($request->get('display_name')),
			'description'  => $request->get('description'),
			'unchangeable' => false
		]);

		/*
		 * Set role environments
		 */

		$environments = $request->only('environments');

		if (count($environments['environments']) > 0)
		{
			$role->environments()->detach();
			$role->environments()->attach($environments['environments']);
		}

		/*
		 * Set role permissions
		 */

		$permissions = $request->only('role_permission_id');

		if (count($permissions['role_permission_id']) > 0)
		{
			$role->permissions()->attach($permissions['role_permission_id']);
		}

		return $this->redirectTo('admin/roles');
	}

	/**
	 * @param $id
	 */
	public function show($id)
	{
		//
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$role = $this->r_role->find($id);
		$permissions = $this->r_permission->all();

		return $this->output(
			'users.admin.roles.edit',
			[
				'role'        => $role,
				'permissions' => $permissions
			]
		);
	}

	/**
	 * @param              $id
	 * @param IFormRequest $request
	 *
	 * @return mixed|\Redirect
	 */
	public function update($id, IFormRequest $request)
	{
		$role = $this->r_role->update([
			'name'         => $request->get('name'),
			'display_name' => trim($request->get('display_name')),
			'description'  => $request->get('description'),
			'unchangeable' => false
		], $id);

		$permissions = $request->only('role_permission_id');
		$role->permissions()->detach();

		if (count($permissions['role_permission_id']) > 0)
		{
			$role->permissions()->attach($permissions['role_permission_id']);
		}

		return $this->redirectTo('admin/roles');
	}

	/**
	 * @param $id
	 *
	 * @return string
	 */
	public function destroy($id)
	{
		return 'T\'es pas fou! On supprime pas les utilisateurs!';
	}
}
