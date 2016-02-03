<?php

namespace App\CVEPDB\Multigaming\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'multigaming_logs';

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
