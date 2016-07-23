<?php namespace cms\Core\Domain\Users\Roles\Repositories;

use Core\Domain\Environments\Facades\EnvironmentFacade;
use Core\Domain\Roles\Entities\Role;
use CVEPDB\Domain\Roles\Repositories\RoleRepositoryEloquent as RepositoryEloquent;
use Core\Domain\Roles\Criterias\EnvironmentsCriteria;
use Core\Domain\Roles\Events\RoleCreatedEvent;
use Core\Domain\Roles\Events\RoleUpdatedEvent;
use Core\Domain\Roles\Events\RoleDeletedEvent;

/**
 * Class RolesRepositoryEloquent
 * @package cms\Core\Domain\Roles\Roles\Repositories
 */
class RolesRepositoryEloquent extends RepositoryEloquent
{

	public $fields = [
		'roles.id',
		'roles.name',
		'roles.display_name',
		'roles.description',
		'roles.unchangeable'
	];

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Role::class;
	}

	/**
	 * Create role and fire event "RoleCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event Core\Domain\Roles\Events\RoleUpdatedEvent
	 * @return \Core\Domain\Roles\Entities\Role
	 */
	public function create(array $attributes)
	{
		$role = parent::create($attributes);

		event(new RoleCreatedEvent($role));

		return $role;
	}

	/**
	 * Update role and fire event "RoleUpdatedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $id
	 *
	 * @event Core\Domain\Roles\Events\RoleUpdatedEvent
	 * @return \Core\Domain\Roles\Entities\Role
	 */
	public function update(array $attributes, $id)
	{
		$role = parent::update($attributes, $id);

		event(new RoleUpdatedEvent($role));

		return $role;
	}

	/**
	 * Delete role and fire event "RoleDeletedEvent".
	 *
	 * @param integer $id
	 *
	 * @event Core\Domain\Roles\Events\RoleDeletedEvent
	 * @return int
	 */
	public function delete($id)
	{
		$role = parent::delete($id);

		event(new RoleDeletedEvent($id));

		return $role;
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
	 * Filter roles by environments.
	 *
	 * @param array $envs the list of environment IDs
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterEnvironments($envs = [])
	{
		$envs = array_filter($envs);

		if (count($envs))
		{
			$this->pushCriteria(new EnvironmentsCriteria($envs));
		}
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
