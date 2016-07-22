<?php namespace Core\Domain\Users\Transformers;

use League\Fractal\TransformerAbstract;
use Core\Domain\Users\Entities\User;

/**
 * Class UserListTransformer
 * @package Core\Domain\Users\Transformers
 */
class UserListTransformer extends TransformerAbstract
{

	/**
	 * @param User $user
	 *
	 * @return array
	 */
	public function transform(User $user)
	{
		$data = [
			'id'           => (int)$user->id,
			'first_name'   => $user->first_name,
			'last_name'    => $user->last_name,
			'full_name'    => $user->full_name,
			'email'        => $user->email,
			'deleted_at'   => $user->deleted_at,
			'roles'        => [],
			'environments' => []
		];

		/*
		 * List environment(s) linked to the user.
		 */

		if (cmsuser_can_see_env())
		{
			foreach ($user->environments as $env)
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

		/*
		 * List role(s) linked to the user.
		 */

		foreach ($user->roles as $role)
		{
			$data['roles'][] = [
				'id'           => $role->id,
				'display_name' => trans($role->display_name),
			];
		}

		return $data;
	}
}
