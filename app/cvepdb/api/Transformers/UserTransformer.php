<?php

namespace App\CVEPDB\Api\Transformers;

use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
    public function transform (User $user) {
        return [
            'id'    => (int)$user->id,
            'name'  => $user->name,
            'email' => $user->email
        ];
    }
}