<?php namespace Core\Domain\Roles\Entities;

use CVEPDB\Domain\Roles\Entities\Role as Model;
use Phoenix\EloquentMeta\MetaTrait;
use Core\Domain\Environments\Facades\EnvironmentFacade;
use Core\Domain\Logs\Traits\LogTrait;
use Core\Domain\Environments\Traits\EnvironmentTrait;

/**
 * Class Role
 * @package Core\Domain\Roles\Entities
 */
class Role extends Model
{

	use MetaTrait;
	use LogTrait;
	use EnvironmentTrait;

	/**
	 * Get the default "belongsToMany" link name, present in Environment model.
	 *
	 * @return string
	 */
	protected static function getBelongsToManyEnvironmentName()
	{
		return 'roles';
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'display_name',
		'description',
		'unchangeable',
	];

	/**
	 * Environments that belong to the role.
	 */
	public function environments()
	{
		return $this->belongsToMany('Core\Domain\Environments\Entities\Environment');
	}

	/**
	 * The users that belong to the role.
	 */
	public function users()
	{
		return $this->belongsToMany('CVEPDB\Domain\Users\Entities\User')
			->join('environment_user', 'role_user.user_id', '=', 'environment_user.user_id')
			->where('environment_user.environment_id', '=', EnvironmentFacade::currentId())
			->join('environment_role', 'roles.id', '=', 'environment_role.role_id')
			->where('environment_role.environment_id', '=', EnvironmentFacade::currentId());
	}

	/**
	 * The permission that belong to the role.
	 */
	public function permissions()
	{
		return $this->belongsToMany('CVEPDB\Domain\Permissions\Entities\Permission')
			->join('environment_role', 'roles.id', '=', 'environment_role.role_id')
			->where('environment_role.environment_id', '=', EnvironmentFacade::currentId());
	}

	/**
	 * The users that belong to the role for every environments.
	 */
	public function _users()
	{
		return $this->belongsToMany('CVEPDB\Domain\Users\Entities\User');
	}

	/**
	 * The permission that belong to the role for every environments.
	 */
	public function _permissions()
	{
		return $this->belongsToMany('CVEPDB\Domain\Permissions\Entities\Permission');
	}

}
