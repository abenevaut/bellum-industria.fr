<?php namespace cms\Core\Domain\Users\Roles\Transformers;

use League\Fractal\TransformerAbstract;
use cms\Core\Domain\Users\Roles\Role;

/**
 * Class RoleListTransformer
 * @package cms\Core\Domain\Users\Roles\Transformers
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

		if (cmsuser_can_see_env())
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
