<?php namespace Modules\Users\Entities;

use CVEPDB\Repositories\Users\User as UserModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends UserModel
{
    use SoftDeletes;

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

    /**
     * The apikey that belong to the user.
     */
    public function apikey()
    {
        return $this->hasOne('Modules\Users\Entities\ApiKey');
    }
}
