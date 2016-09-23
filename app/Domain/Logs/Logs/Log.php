<?php namespace cms\Domain\Logs\Logs;

use cms\Infrastructure\Abstractions\ModelAbstract;

/**
 * Class Log
 *
 * @package cms\Domain\Logs\Logs
 * @property int $id
 * @property int $user_id
 * @property int $content_id
 * @property string $content_type
 * @property string $action
 * @property string $description
 * @property string $details
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \cms\Domain\Users\Users\User $users
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Logs\Logs\Log whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Logs\Logs\Log whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Logs\Logs\Log whereContentId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Logs\Logs\Log whereContentType($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Logs\Logs\Log whereAction($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Logs\Logs\Log whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Logs\Logs\Log whereDetails($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Logs\Logs\Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Logs\Logs\Log whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Log extends ModelAbstract
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'logs';

	protected $fillable = [
		'user_id',
		'content_id',
		'content_type',
		'action',
		'description',
		'details'
	];

	/**
	 * The users that belong to the log.
	 */
	public function users()
	{
		return $this->hasOne('cms\Domain\Users\Users\User');
	}

}
