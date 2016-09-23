<?php namespace cms\Domain\Users\Permissions;

use cms\Infrastructure\Abstractions\Model\PermissionModelAbstract;
use Phoenix\EloquentMeta\MetaTrait;

/**
 * Class Permission
 *
 * @package cms\Domain\Users\Permissions
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Roles\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Phoenix\EloquentMeta\Meta[] $meta
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Permissions\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Permissions\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Permissions\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Permissions\Permission whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Permissions\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\Permissions\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
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
