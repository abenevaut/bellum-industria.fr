<?php namespace Core\Domain\Roles\Repositories;

use Core\Domain\Environments\Facades\EnvironmentFacade;
use Core\Domain\Roles\Entities\Role;
use CVEPDB\Domain\Roles\Repositories\RoleRepositoryEloquent as RepositoryEloquent;

/**
 * Class RoleRepositoryEloquent
 * @package Modules\Users\Repositories
 */
class RoleRepositoryEloquent extends RepositoryEloquent
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Role::class;
	}

	public function create(array $attributes)
	{
		$user = parent::create($attributes);

		return $user;
	}

	public function update(array $attributes, $id)
	{
		$user = parent::update($attributes, $id);

		return $user;
	}

	public function delete($id)
	{
		$user = parent::delete($id);

		return $user;
	}

	/**
	 * @param integer $id
	 */
	public function findAndDelete($id)
	{
		$role = $this->find($id);

		$role->permissions()->detach();
		$role->environments()->detach();

		$this->delete($id);
	}

	/**
	 * Set permissions for the current role.
	 *
	 * @param \Core\Domain\Roles\Entities\Role $role
	 * @param array                            $permissions
	 */
	public function set_role_permissions(Role $role, array $permissions = [])
	{
		$role->permissions()->detach();

		if (count($permissions) > 0)
		{
			$role->permissions()->attach($permissions);
		}
	}

	/**
	 * Set environments for the current role.
	 * If no environment is set, we set the current env as default.
	 *
	 * @param \Core\Domain\Roles\Entities\Role $role
	 * @param array                            $environments
	 */
	public function set_role_environments(Role $role, array $environments = [])
	{
		$role->environments()->detach();

		if (count($environments) > 0)
		{
			$role->environments()->attach($environments);
		}
		else
		{
			$role->environments()->attach([EnvironmentFacade::currentId()]);
		}
	}
}
