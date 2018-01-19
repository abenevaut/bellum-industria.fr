<?php namespace bellumindustria\Domain\Users\Users\Transformers;

use bellumindustria\Infrastructure\Contracts\Transformers\TransformerAbstract;
use bellumindustria\Domain\Users\Users\User;

class AjaxCheckUserEmailTransformer extends TransformerAbstract
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
			'email' => $model->email,
		];

		return $data;
	}
}
