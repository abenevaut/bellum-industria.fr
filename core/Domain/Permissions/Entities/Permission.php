<?php namespace Core\Domain\Permissions\Entities;

use CVEPDB\Domain\Permissions\Entities\Permission as Model;
use Phoenix\EloquentMeta\MetaTrait;
use Core\Domain\Logs\Traits\LogTrait;
use Core\Domain\Environments\Traits\EnvironmentTrait;

/**
 * Class Permission
 * @package Modules\Users\Entities
 */
class Permission extends Model
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

	/**
	 * Environments that belong to the permission.
	 */
	public function environments()
	{
		return $this->belongsToMany('Core\Domain\Environments\Entities\Environment');
	}

}
