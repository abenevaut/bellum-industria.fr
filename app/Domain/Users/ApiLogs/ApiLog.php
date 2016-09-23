<?php namespace cms\Domain\Users\ApiLogs;

use Chrisbjr\ApiGuard\Models\ApiLog as ApiLogApiGuard;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use cms\Domain\Logs\Logs\Traits\LogTrait;

/**
 * Class ApiLog
 *
 * @package cms\Domain\Users\ApiLogs
 * @property int $id
 * @property int $api_key_id
 * @property string $route
 * @property string $method
 * @property string $params
 * @property string $ip_address
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \cms\Domain\Users\ApiKeys\ApiKey $apikey
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiLogs\ApiLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiLogs\ApiLog whereApiKeyId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiLogs\ApiLog whereRoute($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiLogs\ApiLog whereMethod($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiLogs\ApiLog whereParams($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiLogs\ApiLog whereIpAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiLogs\ApiLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiLogs\ApiLog whereUpdatedAt($value)
 * @mixin \Eloquent
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
		return $this->hasOne('cms\Domain\Users\ApiKeys\ApiKey', 'api_key_id');
	}

}
