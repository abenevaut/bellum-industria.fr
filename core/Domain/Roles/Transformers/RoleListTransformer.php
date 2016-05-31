<?php namespace Core\Domain\Roles\Transformers;

use Illuminate\Support\Facades\Auth;
use League\Fractal\TransformerAbstract;
use Core\Domain\Roles\Entities\Role;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;
use Core\Domain\Permissions\Repositories\PermissionRepositoryEloquent;

/**
 * Class RoleListTransformer
 * @package Core\Domain\Roles\Transformers
 */
class RoleListTransformer extends TransformerAbstract
{

	/**
	 * @param Role $role
	 *
	 * @return array
	 */
	public function transform(Role $role)
	{
		/*
		 * List environment(s) linked to the role.
		 */

		$environments = [];

		if (
			Auth::check()
			&& (
				Auth::user()->hasRole(RoleRepositoryEloquent::ADMIN)
				|| Auth::user()->hasPermission(PermissionRepositoryEloquent::SEE_ENVIRONMENT)
			)
		)
		{
			foreach ($role->environments as $env)
			{
				$environments[] = [
					'id'     => $env->id,
					'name'   => $env->name,
					'domain' => $env->domain,
				];
			}
		}

		return [
			'id'           => (int)$role->id,
			'name'         => $role->name,
			'display_name' => $role->display_name,
			'description' => $role->description,
			'unchangeable' => $role->unchangeable,
			'environments' => $environments
		];
	}
}
