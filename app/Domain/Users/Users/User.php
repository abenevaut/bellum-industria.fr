<?php namespace abenevaut\Domain\Users\Users;

use abenevaut\Infrastructure\
{
	Interfaces\Domain\Users\Users\HandshakableInterface,
	Interfaces\Domain\Users\Users\UserCivilitiesInterface,
	Interfaces\Domain\Users\Users\UserRolesInterface,
	Contracts\Model\AuthenticatableModelAbstract,
	Contracts\Model\IdentifiableTrait,
	Contracts\Model\Notifiable,
	Contracts\Model\SoftDeletes
};
use abenevaut\Domain\Users\Users\
{
	Notifications\CreatedAccountByAdministrator,
	Notifications\ResetPassword,
	Traits\HandshakeNotificationTrait,
	Traits\NamableTrait
};
use abenevaut\Domain\Users\Leads\
{
	Lead
};

class User extends AuthenticatableModelAbstract implements UserCivilitiesInterface, UserRolesInterface, HandshakableInterface
{

	use Notifiable;
	use IdentifiableTrait;
	use SoftDeletes;
	use HandshakeNotificationTrait;
	use NamableTrait;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'uniqid',
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
	 * Is the user customer ?
	 *
	 * @return bool
	 */
	public function getIsCustomerAttribute()
	{
		return self::ROLE_CUSTOMER === $this->role;
	}

	/**
	 * Get the lead that owns the user.
	 */
	public function lead()
	{
		return $this->hasOne(Lead::class);
	}
}
