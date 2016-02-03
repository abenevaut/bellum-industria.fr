<?php

namespace App\Multigaming\Models;

use CVEPDB\Repositories\Users\User as UserBaseModel;

use App\Multigaming\Traits\Models\LogTrait;

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
        return $this->belongsToMany('App\Multigaming\Models\Team', 'multigaming_team_user');
    }
}
