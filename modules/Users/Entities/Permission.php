<?php namespace Modules\Users\Entities;

use Core\Domain\Permissions\Entities\Permission as Model;

/**
 * Class Permission
 * @package Modules\Users\Entities
 */
class Permission extends Model
{
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
