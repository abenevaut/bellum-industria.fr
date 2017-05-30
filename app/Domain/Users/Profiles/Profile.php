<?php

namespace bellumindustria\Domain\Users\Profiles;

use bellumindustria\Infrastructure\Contracts\Model\ModelAbstract;

class Profile extends ModelAbstract
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'first_name',
		'last_name',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];

	/**
	 * @return mixed
	 */
	public function user() {
		return $this
			->belongsTo('bellumindustria\Domain\Users\Users\User');
	}

	/**
	 * Get the profession record associated with the profile.
	 */
	public function tokens() {
		return $this->belongsToMany(
			'bellumindustria\Domain\Users\Profiles\ProfilesTokens'
		);
	}
}
