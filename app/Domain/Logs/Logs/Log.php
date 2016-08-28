<?php namespace cms\Domain\Logs\Logs;

use cms\Infrastructure\Abstractions\ModelAbstract;

/**
 * Class Log
 * @package cms\Domain\Logs\Logs
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
		return $this->hasOne('CVEPDB\Models\User');
	}

}
