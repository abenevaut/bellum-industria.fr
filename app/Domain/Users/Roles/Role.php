<?php namespace cms\Domain\Users\Roles;

use Phoenix\EloquentMeta\MetaTrait;
use cms\App\Facades\Environments;
use cms\Infrastructure\Contracts\Model\RoleModelAbstract;
use cms\Domain\Environments\Environments\Traits\EnvironmentTrait;

/**
 * Class Role
 * @package cms\Domain\Users\Roles
 */
class Role extends RoleModelAbstract
{

	use MetaTrait;
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
		return $this->belongsToMany('cms\Domain\Environments\Environments\Environment');
	}

	/**
	 * The users that belong to the role.
	 */
	public function users()
	{
		return $this->belongsToMany('cms\Domain\Users\Users\User')
			->join('environment_user', 'role_user.user_id', '=', 'environment_user.user_id')
			->where('environment_user.environment_id', '=', Environments::currentId())
			->join('environment_role', 'roles.id', '=', 'environment_role.role_id')
			->where('environment_role.environment_id', '=', Environments::currentId());
	}

	/**
	 * The permission that belong to the role.
	 */
	public function permissions()
	{
		return $this->belongsToMany('cms\Domain\Users\Permissions\Permission')
			->join('environment_role', 'permission_role.role_id', '=', 'environment_role.role_id')
			->where('environment_role.environment_id', '=', Environments::currentId());
	}

	/**
	 * The users that belong to the role for every environments.
	 */
	public function _users()
	{
		return $this->belongsToMany('cms\Domain\Users\Users\User');
	}

	/**
	 * The permission that belong to the role for every environments.
	 */
	public function _permissions()
	{
		return $this->belongsToMany('cms\Domain\Users\Permissions\Permission');
	}

}
