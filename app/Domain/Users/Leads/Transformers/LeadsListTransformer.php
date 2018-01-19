<?php

namespace abenevaut\Domain\Users\Leads\Transformers;

use abenevaut\Infrastructure\Contracts\Transformers\TransformerAbstract;
use abenevaut\Domain\Users\Leads\Lead;
use abenevaut\Domain\Users\Users\User;

class LeadsListTransformer extends TransformerAbstract
{

	/**
	 * Transform the Lead entity
	 *
	 * @param Lead $model
	 *
	 * @return array
	 */
	public function transform(Lead $model)
	{
		return [
			'id' => (int)$model->id,
			'identifier' => $model->identifier,
			'civility_name' => $model->civility_name,
			'email' => $model->email,
			'user' => [
				'is_user' => $model->user instanceof User,
				'id' => (int)$model->user_id,
			],
		];
	}
}
