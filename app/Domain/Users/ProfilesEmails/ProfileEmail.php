<?php namespace bellumindustria\Domain\Users\ProfilesEmails;

use bellumindustria\Infrastructure\Contracts\Model\ModelAbstract;

class ProfileEmail extends ModelAbstract
{

	/**
	 * @var string
	 */
	protected $table = 'profiles_emails';

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
		'email'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];
}
