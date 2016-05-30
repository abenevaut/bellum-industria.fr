<?php namespace Core\Domain\Environments\Entities;

use Illuminate\Database\Eloquent\Model;
use Core\Domain\Logs\Traits\LogTrait;

/**
 * Class Environment
 * @package Core\Domain\Environments\Entities
 */
class Environment extends Model
{

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
		return $this->belongsToMany('Core\Domain\Users\Entities\User');
	}

	/**
	 * Roles that belong to the env.
	 */
	public function roles()
	{
		return $this->belongsToMany('Core\Domain\Roles\Entities\Role');
	}

	/**
	 * Permissions that belong to the env.
	 */
	public function permissions()
	{
		return $this->belongsToMany('Core\Domain\Permissions\Entities\Permission');
	}

}
