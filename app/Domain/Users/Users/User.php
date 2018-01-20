<?php namespace bellumindustria\Domain\Users\Users;

use bellumindustria\Infrastructure\
{
	Interfaces\Domain\Users\Users\HandshakableInterface,
	Interfaces\Domain\Users\Users\UserCivilitiesInterface,
	Interfaces\Domain\Users\Users\UserRolesInterface,
	Interfaces\Domain\Locale\LocalesInterface,
	Interfaces\Domain\Locale\TimeZonesInterface,
	Contracts\Model\AuthenticatableModelAbstract,
	Contracts\Model\IdentifiableTrait,
	Contracts\Model\Notifiable,
	Contracts\Model\SoftDeletes,
	Contracts\Model\TimeStampsTz,
	Contracts\Model\SoftDeletesTz
};
use bellumindustria\Domain\Users\
{
	ProvidersTokens\ProviderToken,
	Users\Notifications\CreatedAccountByAdministrator,
	Users\Notifications\ResetPassword,
	Users\Traits\HandshakeNotificationTrait,
	Users\Traits\NamableTrait,
	Profiles\Traits\ProfileableTrait,
	Leads\Lead
};

class User extends AuthenticatableModelAbstract implements UserCivilitiesInterface, UserRolesInterface, LocalesInterface, TimeZonesInterface, HandshakableInterface
{

	use Notifiable;
	use IdentifiableTrait;
	use SoftDeletes;
	use HandshakeNotificationTrait;
	use NamableTrait;
	use ProfileableTrait;
	use TimeStampsTz;
	use SoftDeletesTz;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'uniqid',
		'locale',
		'timezone',
		'role',
		'civility',
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
		'remember_token',
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
	 * Send the password reset notification.
	 *
	 * @param string $token
	 *
	 * @return $this
	 */
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetPassword($token));

		return $this;
	}

	/**
	 * Send the created account notification for created account by administrator.
	 *
	 * @return $this
	 */
	public function sendCreatedAccountByAdministratorNotification()
	{
		$this->notify(new CreatedAccountByAdministrator($this));

		return $this;
	}

	/**
	 * Is the user administrator ?
	 *
	 * @return bool
	 */
	public function getIsAdministratorAttribute()
	{
		return self::ROLE_ADMINISTRATOR === $this->role;
	}

	/**
	 * Is the user a gamer ?
	 *
	 * @return bool
	 */
	public function getIsGamerAttribute()
	{
		return self::ROLE_GAMER === $this->role;
	}

	/**
	 * Get the lead that owns the user.
	 */
	public function lead()
	{
		return $this->hasOne(Lead::class);
	}

	/**
	 * Get the providers with tokens that owns the user.
	 */
	public function providers_tokens()
	{
		return $this->hasMany(ProviderToken::class);
	}
}
