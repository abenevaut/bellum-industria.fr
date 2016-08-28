<?php namespace cms\Domain\Environments\Environments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use cms\Domain\Logs\Logs\Traits\LogTrait;

/**
 * Class Environment
 * @package cms\Domain\Environments\Environments
 */
class Environment extends Model
{

	use SoftDeletes;
	use LogTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'environments';

	protected $fillable = [
		'id',
		'name',
		'reference',
		'domain'
	];

	/**
	 * Users that belong to the env.
	 */
	public function users()
	{
		return $this->belongsToMany('cms\Domain\Users\Users\User');
	}

	/**
	 * Roles that belong to the env.
	 */
	public function roles()
	{
		return $this->belongsToMany('cms\Domain\Users\Roles\Role');
	}

}
