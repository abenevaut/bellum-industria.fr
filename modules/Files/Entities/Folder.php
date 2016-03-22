<?php

namespace Modules\Files\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Folder extends Model implements Transformable, HasMedia
{
    use TransformableTrait;
    use HasMediaTrait;

    protected $fillable = [
        'folder_id', // parent
        'name',
        'disk',
    ];

    /**
     * The parent that belong to the folder.
     */
    public function parent()
    {
        return $this->hasOne('Modules\Files\Entities\Folder', 'id', 'folder_id');
    }

    /**
     * The children that belong to the folder.
     */
    public function children()
    {
        return $this->hasMany('Modules\Files\Entities\Folder');
    }
}
