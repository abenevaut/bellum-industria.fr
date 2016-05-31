<?php namespace Modules\Users\Repositories;

use Illuminate\Container\Container as Application;
use Core\Domain\Users\Repositories\UserRepositoryEloquent as CoreUserRepositoryEloquent;
use Core\Domain\Users\Repositories\ApiKeyRepositoryEloquent;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;

/**
 * Class UserRepositoryEloquent
 * @package Modules\Users\Repositories
 */
class UserRepositoryEloquent extends CoreUserRepositoryEloquent
{

	/**
	 * UserRepositoryEloquent constructor.
	 *
	 * @param Application              $app
	 * @param RoleRepositoryEloquent   $r_roles
	 * @param ApiKeyRepositoryEloquent $r_apikey
	 */
	public function __construct(
		Application $app,
		RoleRepositoryEloquent $r_roles,
		ApiKeyRepositoryEloquent $r_apikey
	)
	{
		parent::__construct($app, $r_roles, $r_apikey);
	}

}
