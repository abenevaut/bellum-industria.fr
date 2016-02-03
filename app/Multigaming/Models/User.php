<?php

namespace App\CVEPDB\Multigaming\Models;

use App\User as UserBaseModel;

use App\CVEPDB\Multigaming\Traits\Models\LogTrait;

class User extends UserBaseModel
{
    use LogTrait;

    /**
     * @var array LogTrait property
     */
    protected static $recordEvents = [
        'created',
        'updated',
        'deleted',
    ];

    /**
     * The teams that belong to the user.
     */
    public function teams()
    {
        return $this->belongsToMany('App\CVEPDB\Multigaming\Models\Team', 'multigaming_team_user');
    }
}
