<?php namespace Modules\Users\Entities;

use Core\Domain\Users\Entities\User as Model;

/**
 * Class User
 * @package Modules\Users\Entities
 */
class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
