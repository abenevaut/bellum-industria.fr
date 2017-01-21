<?php namespace cms\Domain\Users\Users\Transformers;

use League\Fractal\TransformerAbstract;
use cms\Domain\Users\Users\User;

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

		$birth_date = $user->birth_date_carbon;

		if (!is_null($birth_date))
		{
			$birth_date = $birth_date->format(trans('global.date_format'));
		}

		$data = [
			'id'               => (int)$user->id,
			'civility'         => $user->civility,
			'first_name'       => $user->first_name,
			'last_name'        => $user->last_name,
			'full_name'        => $user->full_name,
			'email'            => $user->email,
			'birth_date'       => $birth_date,
			'apikey'           => (
				(!is_null($user->apikey))
					? $user->apikey->key
					: ''
			),
			'deleted_at'       => $user->deleted_at,
			'role'             => $user->role,
			'environments'     => [],
			'environments_ids' => [],
			'addresses'        => [
				'primary' => [
					'country_id'    => null,
					'state_id'      => null,
					'substate_id'   => null,
					'country_name'  => '',
					'state_name'    => '',
					'substate_name' => '',
					'street'        => '',
					'street_extra'  => '',
					'city'          => '',
					'zip'           => '',
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
						'country_id'    => !is_null($primary_address->locator)
							? $primary_address->locator->id
							: null,
						'state_id'      => null,
						'substate_id'   => null,
						'country_name'  => !is_null($primary_address->locator)
							? $primary_address->locator->name
							: '',
						'state_name'    => '',
						'substate_name' => '',
						'street'        => $primary_address->street,
						'street_extra'  => $primary_address->street_extra,
						'city'          => $primary_address->city,
						'zip'           => $primary_address->zip,
					];
					break;
				}
				case 'CVEPDB\Addresses\Domain\Addresses\States\State':
				{
					$data['addresses']['primary'] = [
						'country_id'    => !is_null($primary_address->locator)
							? $primary_address->locator->country->id
							: null,
						'state_id'      => !is_null($primary_address->locator)
							? $primary_address->locator->id
							: null,
						'substate_id'   => null,
						'country_name'  => !is_null($primary_address->locator)
							? $primary_address->locator->country->name
							: '',
						'state_name'    => !is_null($primary_address->locator)
							? $primary_address->locator->name
							: '',
						'substate_name' => '',
						'street'        => $primary_address->street,
						'street_extra'  => $primary_address->street_extra,
						'city'          => $primary_address->city,
						'zip'           => $primary_address->zip,
					];
					break;
				}
				case 'CVEPDB\Addresses\Domain\Addresses\SubStates\SubState':
				{
					$data['addresses']['primary'] = [
						'country_id'    => !is_null($primary_address->locator)
							? $primary_address->locator->state->country->id
							: null,
						'state_id'      => !is_null($primary_address->locator)
							? $primary_address->locator->state->id
							: null,
						'substate_id'   => !is_null($primary_address->locator)
							? $primary_address->locator->id
							: null,
						'country_name'  => !is_null($primary_address->locator)
							? $primary_address->locator->state->country->name
							: '',
						'state_name'    => !is_null($primary_address->locator)
							? $primary_address->locator->state->name
							: '',
						'substate_name' => !is_null($primary_address->locator)
							? $primary_address->locator->name
							: '',
						'street'        => $primary_address->street,
						'street_extra'  => $primary_address->street_extra,
						'city'          => $primary_address->city,
						'zip'           => $primary_address->zip,
					];
					break;
				}
			}
		}

		/*
		 * List environment(s) linked to the user.
		 */

		if (cms_is_superadmin())
		{
			foreach ($user->environments as $env)
			{
				$data['environments_ids'][] = $env->id;

				$data['environments'][] = [
					'id'        => $env->id,
					'name'      => $env->name,
					'reference' => $env->reference,
					'domain'    => $env->domain,
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
