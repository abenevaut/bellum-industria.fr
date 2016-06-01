<?php namespace Modules\Users\Http\Outputters\Admin;

use Core\Domain\Environments\Facades\EnvironmentFacade;
use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Core\Domain\Roles\Presenters\RoleListPresenter;
use Core\Domain\Roles\Repositories\PermissionRepositoryEloquent;
use Illuminate\Support\Facades\Auth;
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

		if (!$this->user_can_see_environment)
		{
			$this->r_role->filterEnvironments([EnvironmentFacade::currentId()]);
		}

		$roles = $this->r_role
			->with(['environments', 'permissions'])
			->paginate(config('app.pagination'), $this->r_role->fields);

		return $this->output(
			'users.admin.roles.index',
			[
				'roles' => $roles,
				'user_can_see_env' => $this->user_can_see_environment
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
				'permissions' => $permissions,
				'user_can_see_env' => $this->user_can_see_environment
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
		$environments = is_null($environments['environments'])
			? []
			: $environments['environments'];

		$this->r_role->set_role_environments($role, $environments);

		/*
		 * Set role permissions
		 */

		$permissions = $request->only('role_permission_id');
		$permissions = is_null($permissions['role_permission_id'])
			? []
			: $permissions['role_permission_id'];

		$this->r_role->set_role_permissions($role, $permissions);

		return $this->redirectTo('admin/roles')
			->with('message-success', 'users::roles.create.message.success');
	}

	/**
	 * @param $id
	 */
	public function show($id)
	{
		abort(404);
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
				'permissions' => $permissions,
				'user_can_see_env' => $this->user_can_see_environment
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
		/*
		 * Update the role
		 */

		$role = $this->r_role->update([
			'name'         => $request->get('name'),
			'display_name' => trim($request->get('display_name')),
			'description'  => $request->get('description'),
			'unchangeable' => false
		], $id);

		/*
		 * Set role environments
		 */

		$environments = $request->only('environments');
		$environments = is_null($environments['environments'])
			? []
			: $environments['environments'];

		$this->r_role->set_role_environments($role, $environments);

		/*
		 * Set role permissions
		 */

		$permissions = $request->only('role_permission_id');
		$permissions = is_null($permissions['role_permission_id'])
			? []
			: $permissions['role_permission_id'];

		$this->r_role->set_role_permissions($role, $permissions);

		return $this->redirectTo('admin/roles')
			->with('message-success', 'users::roles.edit.message.success');
	}

	/**
	 * @param $id
	 *
	 * @return string
	 */
	public function destroy($id)
	{
		$redirectTo = null;

		try
		{
			$this->r_role->findAndDelete($id);

			$redirectTo = $this->redirectTo('admin/roles')
				->with('message-success', 'users::roles.delete.message.success');
		}
		catch (\Exception $e)
		{
			switch ($e->getCode())
			{
				case 1:
				{
					$redirectTo = $this->redirectTo('admin/roles')
						->with('message-error', $e->getMessage());
					break;
				}
			}
		}

		return $redirectTo;
	}
}
