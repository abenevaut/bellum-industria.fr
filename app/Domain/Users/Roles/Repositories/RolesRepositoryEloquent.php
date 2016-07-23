<?php namespace cms\Domain\Users\Roles\Repositories;

use cms\App\Facades\Environments;
use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
use cms\Domain\Users\Roles\Role;
use cms\Domain\Users\Roles\Criterias\EnvironmentsCriteria;
use cms\Domain\Users\Roles\Events\RoleCreatedEvent;
use cms\Domain\Users\Roles\Events\RoleUpdatedEvent;
use cms\Domain\Users\Roles\Events\RoleDeletedEvent;

/**
 * Class RolesRepositoryEloquent
 * @package cms\Domain\Users\Roles\Repositories
 */
class RolesRepositoryEloquent extends RepositoryEloquentAbstract
{

	const ADMIN = 'admin';
	const USER = 'user';

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
	 * @event cms\Domain\Users\Roles\Events\RoleUpdatedEvent
	 * @return \cms\Domain\Users\Roles\Role
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
	 * @event cms\Domain\Users\Roles\Events\RoleUpdatedEvent
	 * @return \cms\Domain\Users\Roles\Role
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
	 * @event cms\Domain\Users\Roles\Events\RoleDeletedEvent
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
	 * @param \cms\Domain\Users\Roles\Role $role
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
	 * @param \cms\Domain\Users\Roles\Role $role
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
			$role->environments()->attach([Environments::currentId()]);
		}
	}
}
