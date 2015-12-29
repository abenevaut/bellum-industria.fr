<?php

namespace App\CVEPDB\Multigaming\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'multigaming_teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
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
        return $this->belongsToMany('App\CVEPDB\Multigaming\Models\User', 'multigaming_team_user');
    }
}
