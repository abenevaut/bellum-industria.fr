<?php

namespace bellumindustria\Domain\Users\Users\Transformers;

use bellumindustria\Infrastructure\Contracts\Transformers\TransformerAbstract;
use bellumindustria\Domain\Users\Users\User;
use bellumindustria\Domain\Users\Leads\Lead;

class UsersListTransformer extends TransformerAbstract
{

	/**
	 * Transform the User entity
	 *
	 * @param User $model
	 *
	 * @return array
	 */
	public function transform(User $model)
	{
		$data = [
			'id' => (int)$model->id,
			'identifier' => $model->uniqid,
			'full_name' => $model->full_name,
			'civility_name' => $model->civility_name,
			'civility' => $model->civility,
			'first_name' => $model->first_name,
			'last_name' => $model->last_name,
			'email' => $model->email,
			'role' => $model->role,
			'lead' => [
				'is_lead' => false,
				'id' => 0,
			],
		];

		if ($model->lead instanceof Lead) {
			$data['lead'] = [
				'is_lead' => true,
				'id' => $model->lead->id,
			];
		}

		return $data;
	}
}
