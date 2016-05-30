<?php namespace Modules\Steam\Repositories;

use Modules\Users\Entities\User;
use Core\Domain\Users\Repositories\UserRepositoryEloquent as UserRepositoryEloquentParent;
use Illuminate\Container\Container as Application;
use Modules\Steam\Repositories\RoleRepositoryEloquent;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends UserRepositoryEloquentParent
{

	/**
	 * UserRepositoryEloquent constructor.
	 *
	 * @param Application                                        $app
	 * @param \Modules\Steam\Repositories\RoleRepositoryEloquent $r_roles
	 */
	public function __construct(Application $app, RoleRepositoryEloquent $r_roles)
	{
		parent::__construct($app, $r_roles);
	}

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return User::class;
	}

}
