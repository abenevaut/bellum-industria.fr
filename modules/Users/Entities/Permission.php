<?php namespace Modules\Users\Entities;

use CVEPDB\Repositories\Permissions\Permission as PermissionModel;

class Permission extends PermissionModel
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
