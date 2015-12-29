<?php

namespace App\CVEPDB\Multigaming\Models;

use App\User as UserBaseModel;

class User extends UserBaseModel
{
    /**
     * The teams that belong to the user.
     */
    public function teams()
    {
        return $this->belongsToMany('App\CVEPDB\Multigaming\Models\Team', 'multigaming_team_user');
    }
}
