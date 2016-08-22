<?php namespace cms\Domain\Users\Permissions;

use cms\Infrastructure\Contracts\Model\PermissionModelAbstract;
use Phoenix\EloquentMeta\MetaTrait;

/**
 * Class Permission
 * @package cms\Domain\Users\Permissions
 */
class Permission extends PermissionModelAbstract
{

	use MetaTrait;

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
