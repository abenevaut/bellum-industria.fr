<?php

namespace App\CVEPDB\Admin\Models;

use App\CVEPDB\Admin\Traits\Models\LogEntitesTrait;
use Illuminate\Database\Eloquent\Model;

class Entite extends Model
{
    use LogEntitesTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entites';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'siret',
        'phone',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
