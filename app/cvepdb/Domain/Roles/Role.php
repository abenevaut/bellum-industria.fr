<?php

namespace App\CVEPDB\Domain\Roles;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\CVEPDB\Domain\Users\User');
    }

//    /**
//     * The permission that belong to the role.
//     */
//    public function permissions()
//    {
//        return $this->belongsToMany('App\permission');
//    }
}
