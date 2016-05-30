<?php namespace Core\Domain\Users\Entities;

use Chrisbjr\ApiGuard\Models\ApiLog as ApiLogApiGuard;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Core\Domain\Logs\Traits\LogTrait;

/**
 * Class ApiLog
 * @package Core\Domain\Users\Entities
 */
class ApiLog extends ApiLogApiGuard implements Transformable
{

	use TransformableTrait;
	use LogTrait;

	protected $fillable = [
		'api_key_id',
		'route',
		'method',
		'params',
		'ip_address'
	];

	/**
	 * The apikeys that belong to the user.
	 */
	public function apikey()
	{
		return $this->hasOne('Core\Domain\Users\Entities\ApiKey', 'api_key_id');
	}
}
