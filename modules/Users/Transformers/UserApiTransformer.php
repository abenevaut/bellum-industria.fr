<?php namespace Modules\Users\Transformers;

use League\Fractal\TransformerAbstract;
use Core\Domain\Users\Entities\User;

/**
 * Class UserApiTransformer
 * @package Modules\Users\Transformers
 */
class UserApiTransformer extends TransformerAbstract
{

	/**
	 * @param User $user
	 *
	 * @return array
	 */
	public function transform(User $user)
	{
		return [
			'id'         => (int)$user->id,
			'first_name' => $user->first_name,
			'last_name'  => $user->last_name,
			'email'      => $user->email
		];
	}
}
