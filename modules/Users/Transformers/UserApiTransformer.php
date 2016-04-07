<?php namespace Modules\Users\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Users\Entities\User;

class UserApiTransformer extends TransformerAbstract
{
    public function transform (User $user) {
        return [
            'id'    => (int)$user->id,
            'first_name'  => $user->first_name,
            'last_name'  => $user->last_name,
            'email' => $user->email
        ];
    }
}
