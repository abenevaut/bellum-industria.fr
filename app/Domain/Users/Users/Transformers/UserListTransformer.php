<?php namespace cms\Domain\Users\Users\Transformers;

use League\Fractal\TransformerAbstract;
use cms\Domain\Users\Users\User;

/**
 * Class UserListTransformer
 * @package cms\Domain\Users\Users\Transformers
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
		$primary_address = $user->flaggedAddress('primary');

		$data = [
			'id'               => (int)$user->id,
			'first_name'       => $user->first_name,
			'last_name'        => $user->last_name,
			'full_name'        => $user->full_name,
			'email'            => $user->email,
			'deleted_at'       => $user->deleted_at,
			'roles'            => [],
			'roles_ids'        => [],
			'environments'     => [],
			'environments_ids' => [],
			'addresses'        => [
				'primary' => [
					'country_id'   => null,
					'state_id'     => null,
					'substate_id'  => null,
					'street'       => '',
					'street_extra' => '',
					'city'         => '',
					'zip'          => '',
				]
			]
		];

		/*
		 * Primary address
		 */

		if (!is_null($primary_address))
		{

			switch ($primary_address->locator_type)
			{
				case 'CVEPDB\Addresses\Domain\Addresses\Countries\Country':
				{
					$data['addresses']['primary'] = [
						'country_id'   => !is_null($primary_address->locator)
							? $primary_address->locator->id
							: null,
						'state_id'     => null,
						'substate_id'  => null,
						'street'       => $primary_address->street,
						'street_extra' => $primary_address->street_extra,
						'city'         => $primary_address->city,
						'zip'          => $primary_address->zip,
					];
					break;
				}
				case 'CVEPDB\Addresses\Domain\Addresses\SubStates\State':
				{
					$data['addresses']['primary'] = [
						'country_id'   => !is_null($primary_address->locator)
							? $primary_address->locator->country->id
							: null,
						'state_id'     => !is_null($primary_address->locator)
							? $primary_address->locator->id
							: null,
						'substate_id'  => null,
						'street'       => $primary_address->street,
						'street_extra' => $primary_address->street_extra,
						'city'         => $primary_address->city,
						'zip'          => $primary_address->zip,
					];
					break;
				}
				case 'CVEPDB\Addresses\Domain\Addresses\SubStates\SubState':
				{
					$data['addresses']['primary'] = [
						'country_id'   => !is_null($primary_address->state)
							? $primary_address->state->country->id
							: null,
						'state_id'     => !is_null($primary_address->state)
							? $primary_address->state->id
							: null,
						'substate_id'  => !is_null($primary_address->locator)
							? $primary_address->locator->id
							: null,
						'street'       => $primary_address->street,
						'street_extra' => $primary_address->street_extra,
						'city'         => $primary_address->city,
						'zip'          => $primary_address->zip,
					];
					break;
				}
			}
		}

		/*
		 * List environment(s) linked to the user.
		 */

		if (cmsuser_can_see_env())
		{
			foreach ($user->environments as $env)
			{
				$data['environments_ids'][] = $env->id;

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
			$data['roles_ids'][] = $role->id;

			$data['roles'][] = [
				'id'           => $role->id,
				'display_name' => trans($role->display_name),
			];
		}

		return $data;
	}
}
