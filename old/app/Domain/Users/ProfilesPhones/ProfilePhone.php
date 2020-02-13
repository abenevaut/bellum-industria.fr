<?php namespace bellumindustria\Domain\Users\ProfilesPhones;

use bellumindustria\Infrastructure\Contracts\Model\ModelAbstract;

class ProfilePhone extends ModelAbstract
{

	/**
	 * @var string
	 */
	protected $table = 'profiles_phones';

	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'profile_id',
		'phone'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];
}
