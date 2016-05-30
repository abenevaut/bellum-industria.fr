<?php namespace Core\Domain\Users\Entities;

use CVEPDB\Domain\Users\Entities\User as Model;

/**
 * Class User
 * @package Core\Domain\Users\Entities
 */
class User extends Model
{

	/**
	 * The apikey that belong to the user.
	 */
	public function apikey()
	{
		return $this->hasOne('Core\Domain\Users\Entities\ApiKey');
	}

	/**
	 * Social tokens that belong to the user.
	 */
	public function tokens()
	{
		return $this->hasMany('Core\Domain\Users\Entities\SocialToken');
	}
}
