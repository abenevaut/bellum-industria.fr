<?php namespace Modules\Dashboard\Entities;

use Core\Entities\AbsModel;

class Dashboard extends AbsModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dashboard';

    protected $fillable = [
        'name',
        'module',
        'status',
    ];

}
