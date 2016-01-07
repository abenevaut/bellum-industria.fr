<?php

namespace App\CVEPDB\Vitrine\Models;

use Illuminate\Database\Eloquent\Model;

class LogContact extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'subject',
        'message'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
