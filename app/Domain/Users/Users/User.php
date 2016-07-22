<?php namespace Core\Domain\Users\Entities;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use CVEPDB\Domain\Users\Entities\User as Model;
use Core\Domain\Environments\Facades\EnvironmentFacade;
use Core\Domain\Logs\Traits\LogTrait;
use Core\Domain\Environments\Traits\EnvironmentTrait;

/**
 * Class User
 * @package Core\Domain\Users\Entities
 */
class User extends Model
{

	use LogTrait;
	use EnvironmentTrait;
	use EntrustUserTrait;

	use Authorizable {
		EntrustUserTrait::can insteadof Authorizable;
		Authorizable::can as authCan;
	}

	/**
	 * Get the default "belongsToMany" link name, present in Environment model.
	 *
	 * @return string
	 */
	protected static function getBelongsToManyEnvironmentName()
	{
		return 'users';
	}

	/**
	 * The apikey that belong to the user.
	 */
	public function apikey()
	{
		return $this->hasOne('Core\Domain\Users\Entities\ApiKey');
	}

	/**
	 * Social tokens that belong to the user.
	 */
	public function tokens()
	{
		return $this->hasMany('Core\Domain\Users\Entities\SocialToken');
	}

	/**
	 * Environments that belong to the user.
	 */
	public function environments()
	{
		return $this->belongsToMany('Core\Domain\Environments\Entities\Environment');
	}

	/**
	 * The roles that belong to the user.
	 */
	public function roles()
	{
		return $this->belongsToMany('CVEPDB\Domain\Roles\Entities\Role')
			->join('environment_user', 'role_user.user_id', '=', 'environment_user.user_id')
			->where('environment_user.environment_id', '=', EnvironmentFacade::currentId())
			->join('environment_role', 'role_user.role_id', '=', 'environment_role.role_id')
			->where('environment_role.environment_id', '=', EnvironmentFacade::currentId());
	}

	/**
	 * The roles that belong to the user for every environments.
	 */
	public function _roles()
	{
		return $this->belongsToMany('CVEPDB\Domain\Roles\Entities\Role');
	}

}
