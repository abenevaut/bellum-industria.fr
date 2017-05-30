<?php

namespace bellumindustria\Domain\Users\Profiles;

use bellumindustria\Infrastructure\Contracts\Model\ModelAbstract;

class ProfileToken extends ModelAbstract
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'profile_id',
		'provider',
		'consumer_key',
		'consumer_secret',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];
}
