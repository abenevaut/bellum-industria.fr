<?php namespace Modules\Users\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Users\Entities\User;

/**
 * Class UsersAdminExcelTransformer
 * @package namespace App\Repositories;
 */
class UsersAdminExcelTransformer extends TransformerAbstract
{

    /**
     * Transform the User entity
     * @param User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'last_name' => $model->last_name,
            'first_name' => $model->first_name,
            'email' => $model->email,
            'roles' => '',
        ];
    }
}
