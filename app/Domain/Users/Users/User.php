<?php namespace cms\Domain\Users\Users;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use cms\Infrastructure\Abstractions\Model\LogAuthenticatableModelAbstract;
use cms\Domain\Domains\Domains\Traits\DomainTrait;

class User extends LogAuthenticatableModelAbstract
{

	use DomainTrait;
	use SoftDeletes;

	/*
	 * Roles
	 */

	const ROLE_SUPERADMIN = 'super-administrator';
	const ROLE_ADMIN = 'administrator';
	const ROLE_MODERATOR = 'moderator';
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
	 * Get the default "belongsToMany" link name, present in Domain model.
	 *
	 * @return string
	 */
	protected static function getBelongsToManyDomainName() {
		return 'users';
	}

	/**
	 * Full name mutator.
	 *
	 * @return string
	 */
	public function getFullNameAttribute() {
		return sprintf(
			'%s %s',
			ucfirst(strtolower($this->first_name)),
			ucfirst(strtolower($this->last_name))
		);
	}

	/**
	 * Is super-administrator mutator to obtain a variable
	 * "is_super_administrator".
	 *
	 * @return bool
	 */
	public function getIsSuperAdministratorAttribute() {
		return in_array(
			$this->role,
			[
				self::ROLE_SUPERADMIN,
			]
		);
	}

	/**
	 * Is administrator mutator to obtain a variable "is_administrator".
	 *
	 * @return bool
	 */
	public function getIsAdministratorAttribute() {
		return in_array(
			$this->role,
			[
				self::ROLE_SUPERADMIN,
				self::ROLE_ADMIN,
			]
		);
	}

	/**
	 * Is moderator mutator to obtain a variable "is_moderator".
	 *
	 * @return bool
	 */
	public function getIsModeratorAttribute() {
		return in_array(
			$this->role,
			[
				self::ROLE_SUPERADMIN,
				self::ROLE_ADMIN,
				self::ROLE_MODERATOR,
			]
		);
	}

	/**
	 * Is user mutator to obtain a variable "is_user".
	 *
	 * @return bool
	 */
	public function getIsUserAttribute() {
		return in_array(
			$this->role,
			[
				self::ROLE_SUPERADMIN,
				self::ROLE_ADMIN,
				self::ROLE_MODERATOR,
				self::ROLE_USER,
			]
		);
	}

	/**
	 * Date mutator to obtain a variable "birth_date_carbon".
	 *
	 * @return \Carbon\Carbon
	 */
	public function getBirthDateCarbonAttribute() {
		if (strcmp("0000-00-00", $this->birth_date))
		{
			return new Carbon($this->birth_date);
		}

		return null;
	}

	/**
	 * Social tokens that belong to the user.
	 */
	public function tokens() {
		return $this
			->hasMany('cms\Domain\Users\SocialTokens\SocialToken');
	}

	/**
	 * Domains that belong to the user.
	 */
	public function domains() {
		return $this
			->belongsToMany('cms\Domain\Domains\Domains\Domain');
	}
}
