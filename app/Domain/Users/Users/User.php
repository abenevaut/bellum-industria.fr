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

	/*
	 * Roles
	 */

	const ROLE_ADMIN = 'admin';
	const ROLE_USER = 'user';

	/*
	 * Civilities
	 */

	const CIVILITY_MADAM = 'madam';
	const CIVILITY_MISS = 'miss';
	const CIVILITY_MISTER = 'mister';

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
		'role',
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
		return sprintf(
			'%s %s',
			ucfirst(strtolower($this->first_name)),
			ucfirst(strtolower($this->last_name))
		);
	}

	/**
	 * Is admin mutator to obtain a variable "is_admin".
	 *
	 * @return bool
	 */
	public function getIsAdminAttribute()
	{
		return $this
			->where(function ($query)
			{
				$query->where('role', '=', self::ROLE_ADMIN);
			})
			->first()
			? true
			: false;
	}

	/**
	 * Is user mutator to obtain a variable "is_user".
	 *
	 * @return bool
	 */
	public function getIsUserAttribute()
	{
		return $this
			->where(function ($query)
			{
				$query->where('role', '=', self::ROLE_USER);
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
		return $this->belongsToMany(
			'cms\Domain\Environments\Environments\Environment'
		);
	}
}
