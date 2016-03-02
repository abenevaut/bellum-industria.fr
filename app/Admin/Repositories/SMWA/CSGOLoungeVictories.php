<?php

namespace App\Admin\Repositories\SMWA;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CSGOLoungeVictories extends Model implements Transformable
{
    use TransformableTrait;

    protected $connection = 'mysql_multigaming';

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'csgolounge_victories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'match_id',
        'team_winner',
        'team_defeat',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the match record associated with the victory.
     */
    public function match()
    {
        return $this->belongsTo('App\Admin\Repositories\SMWA\CSGOLoungeMatches', 'match_id');
    }

    /**
     * Get the winner record associated with the victory.
     */
    public function winner()
    {
        return $this->belongsTo('App\Admin\Repositories\SMWA\CSGOLoungeTeams', 'team_winner');
    }

    /**
     * Get the team defeat record associated with the victory.
     */
    public function defeat()
    {
        return $this->belongsTo('App\Admin\Repositories\SMWA\CSGOLoungeTeams', 'team_defeat');
    }
}
