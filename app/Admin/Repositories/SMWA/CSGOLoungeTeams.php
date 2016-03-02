<?php

namespace App\Admin\Repositories\SMWA;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CSGOLoungeTeams extends Model implements Transformable
{
    use TransformableTrait;

    protected $connection = 'mysql_multigaming';

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'csgolounge_teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function victories()
    {
        return $this->hasMany('App\Admin\Repositories\SMWA\CSGOLoungeVictories', 'team_winner');
    }

    public function defeats()
    {
        return $this->hasMany('App\Admin\Repositories\SMWA\CSGOLoungeVictories', 'team_defeat');
    }
}
