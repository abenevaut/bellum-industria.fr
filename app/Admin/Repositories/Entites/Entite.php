<?php

namespace App\Admin\Repositories\Entites;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Entite extends Model implements Transformable
{
    use TransformableTrait;
    use LogEntiteTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entites';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'siret',
        'phone',
        'email',

        'address',
        'zipcode',
        'city',
        'country',

        'type',
        'status',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The entites that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('App\Admin\Repositories\Users\User');
    }

    /**
     * Get the projects record associated with the entite.
     */
    public function projects()
    {
        return $this->hasMany('App\Admin\Repositories\Projects\Project');
    }
}
