<?php namespace Core\Domain\Roles\Entities;

use CVEPDB\Domain\Roles\Entities\Role as Model;
use Phoenix\EloquentMeta\MetaTrait;

/**
 * Class Role
 * @package Core\Domain\Roles\Entities
 */
class Role extends Model
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
