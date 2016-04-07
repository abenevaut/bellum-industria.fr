<?php namespace Modules\Users\Entities;

use CVEPDB\Repositories\Roles\Role as RoleModel;
use Phoenix\EloquentMeta\MetaTrait;

/**
 * Class Role
 * @package Modules\Users\Entities
 */
class Role extends RoleModel
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
        'unchangeable',
    ];
}
