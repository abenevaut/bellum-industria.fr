<?php namespace cms\Domain\Users\ApiKeys;

use Chrisbjr\ApiGuard\Models\ApiKey as ApiKeyApiGuard;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ApiKey
 * @package cms\Domain\Users\ApiKeys
 */
class ApiKey extends ApiKeyApiGuard implements Transformable
{

	use TransformableTrait;

	protected $fillable = [
		'user_id',
		'key',
		'level',
		'ignore_limits'
	];

	/**
	 * The apilogs that belong to the apikey.
	 */
	public function apilogs()
	{
		return $this->hasMany('Core\Domain\Users\Entities\ApiLog');
	}

	/**
	 * The user that belong to the apikey.
	 */
	public function user()
	{
		return $this->hasOne('Core\Domain\Users\Entities\User');
	}
}
