<?php namespace cms\Domain\Users\Users;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use cms\Infrastructure\Abstractions\Model\LogAuthenticatableModelAbstract;
use cms\App\Facades\Environments;
use cms\Domain\Environments\Environments\Traits\EnvironmentTrait;

/**
 * Class User
 * @package cms\Domain\Users\Users
 */
class User extends LogAuthenticatableModelAbstract
{

	use EnvironmentTrait;
	use EntrustUserTrait;

	use Authorizable {
		EntrustUserTrait::can insteadof Authorizable;
		Authorizable::can as authCan;
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token'
	];

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
		return $this->hasMany('cms\Domain\Users\SocialTokens\SocialToken');
	}

	/**
	 * Environments that belong to the user.
	 */
	public function environments()
	{
		return $this->belongsToMany('cms\Domain\Environments\Environments\Environment');
	}

	/**
	 * The roles that belong to the user.
	 */
	public function roles()
	{
		return $this->belongsToMany('cms\Domain\Users\Roles\Role')
			->join('environment_user', 'role_user.user_id', '=', 'environment_user.user_id')
			->where('environment_user.environment_id', '=', Environments::currentId())
			->join('environment_role', 'role_user.role_id', '=', 'environment_role.role_id')
			->where('environment_role.environment_id', '=', Environments::currentId());
	}

	/**
	 * The roles that belong to the user for every environments.
	 */
	public function _roles()
	{
		return $this->belongsToMany('cms\Domain\Users\Roles\Role');
	}

}
