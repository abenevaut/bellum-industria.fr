<?php namespace Modules\Users\Transformers;

use Core\Domain\Environments\Facades\EnvironmentFacade;
use Illuminate\Support\Facades\Auth;
use League\Fractal\TransformerAbstract;
use Core\Domain\Users\Entities\User;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;
use Core\Domain\Roles\Repositories\PermissionRepositoryEloquent;

/**
 * Class UserAdminExcelTransformer
 * @package Modules\Users\Transformers
 */
class UserAdminExcelTransformer extends TransformerAbstract
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

		// NOTE :: key order is important !
		$data = [
			'id'         => (int)$model->id,
			'last_name'  => $model->last_name,
			'first_name' => $model->first_name,
			'email'      => $model->email
		];

		/**
		 * Roles list
		 */

		$roles = [];
		foreach ($model->roles as $role)
		{
			$roles[] = trans($role->display_name);
		}
		sort($roles);

		$data['roles'] = implode(',' . PHP_EOL, $roles);

		/**
		 * Environments list
		 */

		$environments = [];

		if (
			Auth::user()->hasRole(RoleRepositoryEloquent::ADMIN)
			|| Auth::user()->hasPermission(PermissionRepositoryEloquent::SEE_ENVIRONMENT)
		)
		{
			foreach ($model->environments as $environment)
			{
				$environments[] = trans($environment->name);
			}
			sort($environments);
			$data['environments'] = implode(',' . PHP_EOL, $environments);
		}

		/**
		 * Addresses list
		 */

		$addresses = [];
		foreach ($model->addresses as $addresse)
		{
			$address_info = '';
			if ($addresse->is_primary)
			{
				$address_info = trans('users::addresses.primary');
			}
			else if ($addresse->is_billing)
			{
				$address_info = trans('users::addresses.billing');
			}
			else if ($addresse->is_shipping)
			{
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
		$data['addresses'] = implode(',' . PHP_EOL, $addresses);

		return $data;
	}
}
