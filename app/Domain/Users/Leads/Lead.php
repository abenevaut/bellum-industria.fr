<?php namespace bellumindustria\Domain\Users\Leads;

use bellumindustria\Infrastructure\
{
	Interfaces\Domain\Users\Users\HandshakableInterface,
	Contracts\Model\ModelAbstract,
	Contracts\Model\Notifiable,
	Contracts\Model\IdentifiableTrait
};
use bellumindustria\Domain\Users\Users\
{
	User,
	Traits\HandshakeNotificationTrait,
	Traits\NamableTrait
};

class Lead extends ModelAbstract implements HandshakableInterface
{

	use Notifiable;
	use IdentifiableTrait;
	use HandshakeNotificationTrait;
	use NamableTrait;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'civility',
		'first_name',
		'last_name',
		'email',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];

	/**
	 * Get the user record associated with the lead.
	 */
	public function user()
	{
		return $this
			->belongsTo(User::class)
			->withTrashed();
	}
}
