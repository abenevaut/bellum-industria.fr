<?php namespace cms\Domain\Users\Users;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use CVEPDB\Addresses\Domain\Addresses\Addresses\Traits\AddressableTrait;
use cms\Infrastructure\Abstractions\Model\LogAuthenticatableModelAbstract;
use cms\App\Facades\Environments;
use cms\Domain\Users\Roles\Repositories\RolesRepositoryEloquent;
use cms\Domain\Environments\Environments\Traits\EnvironmentTrait;

/**
 * Class User
 *
 * @package cms\Domain\Users\Users
 * @property int $id
 * @property string $civility
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $birth_date
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read string $full_name
 * @property-read bool $is_admin
 * @property-read \Carbon\Carbon $birth_date_carbon
 * @property-read \cms\Domain\Users\ApiKeys\ApiKey $apikey
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\SocialTokens\SocialToken[] $tokens
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Environments\Environments\Environment[] $environments
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Roles\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Roles\Role[] $_roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\CVEPDB\Addresses\Domain\Addresses\Addresses\Address[] $address
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereCivility($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereBirthDate($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Users\User whereDeletedAt($value)
 * @mixin \Eloquent
 */
class User extends LogAuthenticatableModelAbstract
{

	use AddressableTrait;
	use EnvironmentTrait;

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
