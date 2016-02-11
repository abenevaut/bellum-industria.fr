<?php

namespace App\Admin\Repositories\Entites;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogEntite extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_entites';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'contentId',
        'contentType',
        'action',
        'description',
        'details'
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
        return $this->hasOne('CVEPDB\Repositories\Users\User');
    }
}
