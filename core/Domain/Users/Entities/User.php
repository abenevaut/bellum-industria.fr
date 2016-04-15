<?php namespace Core\Domain\Users\Entities;

use CVEPDB\Domain\Users\Entities\User as Model;

class User extends Model
{
    /**
     * The apikey that belong to the user.
     */
    public function apikey()
    {
        return $this->hasOne('Core\Domain\Users\Entities\ApiKey');
    }
}
