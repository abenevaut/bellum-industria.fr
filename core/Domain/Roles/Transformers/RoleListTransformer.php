<?php namespace Core\Domain\Roles\Transformers;

use Illuminate\Support\Facades\Auth;
use League\Fractal\TransformerAbstract;
use Core\Domain\Roles\Entities\Role;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;
use Core\Domain\Roles\Repositories\PermissionRepositoryEloquent;

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
		$data = [
			'id'           => (int)$role->id,
			'name'         => $role->name,
			'display_name' => $role->display_name,
			'description' => $role->description,
			'unchangeable' => $role->unchangeable,
			'environments' => []
		];

		/*
		 * List environment(s) linked to the role.
		 */

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
				$data['environments'][] = [
					'id'     => $env->id,
					'name'   => $env->name,
					'domain' => $env->domain,
				];
			}
		}
		else
		{
			unset($data['environments']);
		}

		return $data;
	}
}
