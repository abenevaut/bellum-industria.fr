<?php namespace Core\Domain\Roles\Entities;

use CVEPDB\Domain\Roles\Entities\Role as Model;
use Phoenix\EloquentMeta\MetaTrait;
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

}
