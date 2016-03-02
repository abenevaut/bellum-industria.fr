<?php

namespace App\Admin\Repositories\SMWA;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CSGOLoungeMatches extends Model implements Transformable
{
    use TransformableTrait;

    protected $connection = 'mysql_multigaming';

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'csgolounge_matches';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'format',
        'event',
        'ended',
        'csgolounge_match_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the victory record associated with the match.
     */
    public function victory()
    {
        return $this->hasOne('App\Admin\Repositories\SMWA\CSGOLoungeVictories', 'match_id');
    }
}
