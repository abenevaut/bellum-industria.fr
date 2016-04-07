<?php namespace Modules\Users\Entities;

use CVEPDB\Repositories\Permissions\Permission as PermissionModel;
use Phoenix\EloquentMeta\MetaTrait;

/**
 * Class Permission
 * @package Modules\Users\Entities
 */
class Permission extends PermissionModel
{
    use MetaTrait;

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
