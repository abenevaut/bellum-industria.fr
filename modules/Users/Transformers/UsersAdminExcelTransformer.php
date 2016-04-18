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
        $roles = [];
        foreach ($model->roles as $role) {
            $roles[] = trans($role->display_name);
        }
        sort($roles);

        $addresses = [];
        foreach ($model->addresses as $addresse) {

            $address_info = '';
            if ($addresse->is_primary) {
                $address_info = trans('users::addresses.primary');
            } else if ($addresse->is_billing) {
                $address_info = trans('users::addresses.billing');
            } else if ($addresse->is_shipping) {
                $address_info = trans('users::addresses.shipping');
            }

            $addresses[] = $address_info
                . ' : ' . $addresse->organization
                . ' ' . $addresse->street
                . ' ' . $addresse->street_extra
                . ' ' . $addresse->zip
                . ' ' . $addresse->city
                . ' ' . $addresse->state_name
                . ' ' . $addresse->country_name;
        }
        sort($addresses);

        return [
            'id' => (int)$model->id,
            'last_name' => $model->last_name,
            'first_name' => $model->first_name,
            'email' => $model->email,
            'roles' => implode(',' . PHP_EOL, $roles),
            'addresses' => implode(',' . PHP_EOL, $addresses),
        ];
    }
}
