<?php namespace Core\Domain\Logs\Entities;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
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
