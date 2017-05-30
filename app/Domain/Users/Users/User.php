<?php

namespace bellumindustria\Domain\Users\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use bellumindustria\Domain\Users\Profiles\Traits\ProfileableTrait;

class User extends Authenticatable
{
    use Notifiable;
    use ProfileableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
		'email',
		'password',
		'facebook_token',
		'steam_token',
		'twitter_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
		'remember_token',
    ];
}
