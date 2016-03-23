<?php namespace Modules\Users\Entities;

use CVEPDB\Repositories\Users\User as UserModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends UserModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
