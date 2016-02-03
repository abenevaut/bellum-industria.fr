<?php

namespace App\CVEPDB\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class LogEntite extends Model
{
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
        return $this->hasOne('App\CVEPDB\Multigaming\Models\User');
    }
}
