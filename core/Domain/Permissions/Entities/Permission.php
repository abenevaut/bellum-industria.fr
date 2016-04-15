<?php namespace Core\Domain\Permissions\Entities;

use CVEPDB\Domain\Permissions\Entities\Permission as Model;
use Phoenix\EloquentMeta\MetaTrait;

/**
 * Class Permission
 * @package Modules\Users\Entities
 */
class Permission extends Model
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
