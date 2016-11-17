<?php namespace cms\Domain\Users\Users;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use CVEPDB\Addresses\Domain\Addresses\Addresses\Traits\AddressableTrait;
use cms\Infrastructure\Abstractions\Model\LogAuthenticatableModelAbstract;
use cms\App\Facades\Environments;
use cms\Domain\Environments\Environments\Traits\EnvironmentTrait;

/**
 * Class User
 * @package cms\Domain\Users\Users
 */
class User extends LogAuthenticatableModelAbstract
{

	use AddressableTrait;
	use EnvironmentTrait;
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'civility',
		'first_name',
		'last_name',
		'email',
		'birth_date',
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
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
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
	 * Is admin mutator to obtain a variable "is_admin".
	 *
	 * @return bool
	 */
	public function getIsAdminAttribute()
	{
		return $this
			->roles()
			->where(function ($query)
			{
				$query->where('name', '=', RolesRepositoryEloquent::ADMIN);
			})
			->first()
				? true
				: false;
	}

	/**
	 * Date mutator to obtain a variable "birth_date_carbon".
	 *
	 * @return \Carbon\Carbon
	 */
	public function getBirthDateCarbonAttribute()
	{
		if (strcmp("0000-00-00", $this->birth_date))
		{
			return new Carbon($this->birth_date);
		}
		return null;
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
