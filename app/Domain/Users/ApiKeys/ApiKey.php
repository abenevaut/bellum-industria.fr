<?php namespace cms\Domain\Users\ApiKeys;

use Chrisbjr\ApiGuard\Models\ApiKey as ApiKeyApiGuard;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ApiKey
 *
 * @package cms\Domain\Users\ApiKeys
 * @property int $id
 * @property int $user_id
 * @property string $key
 * @property int $level
 * @property bool $ignore_limits
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\ApiLogs\ApiLog[] $apilogs
 * @property-read \cms\Domain\Users\Users\User $user
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiKeys\ApiKey whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiKeys\ApiKey whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiKeys\ApiKey whereKey($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiKeys\ApiKey whereLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiKeys\ApiKey whereIgnoreLimits($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiKeys\ApiKey whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiKeys\ApiKey whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\ApiKeys\ApiKey whereDeletedAt($value)
 * @mixin \Eloquent
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
		return $this->hasMany('cms\Domain\Users\ApiLogs\ApiLog');
	}

	/**
	 * The user that belong to the apikey.
	 */
	public function user()
	{
		return $this->hasOne('cms\Domain\Users\Users\User');
	}

}
