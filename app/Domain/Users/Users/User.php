<?php namespace cms\Domain\Users\Users;

use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use CVEPDB\Addresses\Addressable;
use cms\Infrastructure\Abstractions\Model\LogAuthenticatableModelAbstract;
use cms\App\Facades\Environments;
use cms\Domain\Environments\Environments\Traits\EnvironmentTrait;

/**
 * Class User
 * @package cms\Domain\Users\Users
 */
class User extends LogAuthenticatableModelAbstract
{

	use Addressable;
	use EntrustUserTrait;
	use EnvironmentTrait;

	use SoftDeletes {
		SoftDeletes::restore insteadof EntrustUserTrait;
		EntrustUserTrait::restore as restoreEntrustUserTrait;
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
	 * Full name mutator.
	 *
	 * @return string
	 */
	public function getFullNameAttribute()
	{
		return ucfirst(strtolower($this->first_name)) . " " . ucfirst(strtolower($this->last_name));
	}

	/**
	 * The apikey that belong to the user.
	 */
	public function apikey()
	{
		return $this->hasOne('cms\Domain\Users\ApiKeys\ApiKey');
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
