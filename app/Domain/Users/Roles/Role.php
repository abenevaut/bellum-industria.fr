<?php namespace cms\Domain\Users\Roles;

use cms\App\Facades\Environments;
use cms\Infrastructure\Abstractions\Model\RoleModelAbstract;
use cms\Domain\Environments\Environments\Traits\EnvironmentTrait;

/**
 * Class Role
 *
 * @package cms\Domain\Users\Roles
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool $unchangeable
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Environments\Environments\Environment[] $environments
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Users\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Permissions\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Users\User[] $_users
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Permissions\Permission[] $_permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Permissions\Permission[] $perms
 * @property-read \Illuminate\Database\Eloquent\Collection|\Phoenix\EloquentMeta\Meta[] $meta
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Roles\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Roles\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Roles\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Roles\Role whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Roles\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Roles\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Roles\Role whereUnchangeable($value)
 * @mixin \Eloquent
 */
class Role extends RoleModelAbstract
{

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
			->join('environment_role', 'role_user.role_id', '=', 'environment_role.role_id')
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
