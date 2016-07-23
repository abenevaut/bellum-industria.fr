<?php namespace cms\Domain\Users\Permissions;

use CVEPDB\Domain\Permissions\Entities\Permission as Model;
use Phoenix\EloquentMeta\MetaTrait;
use Core\Domain\Logs\Traits\LogTrait;

/**
 * Class Permission
 * @package cms\Core\Domain\Roles\Permissions
 */
class Permission extends Model
{

	use MetaTrait;
	use LogTrait;

	/**
	 * Get the default "belongsToMany" link name, present in Environment model.
	 *
	 * @return string
	 */
	protected static function getBelongsToManyEnvironmentName()
	{
		return 'permissions';
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
	];

}
