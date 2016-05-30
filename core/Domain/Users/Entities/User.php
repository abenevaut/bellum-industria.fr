<?php namespace Core\Domain\Users\Entities;

use CVEPDB\Domain\Users\Entities\User as Model;
use Core\Domain\Logs\Traits\LogTrait;
use Core\Domain\Environments\Traits\EnvironmentTrait;

/**
 * Class User
 * @package Core\Domain\Users\Entities
 */
class User extends Model
{

	use LogTrait;
	use EnvironmentTrait;

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

	/**
	 * Environments that belong to the user.
	 */
	public function environments()
	{
		return $this->belongsToMany('Core\Domain\Environments\Entities\Environment');
	}

}
