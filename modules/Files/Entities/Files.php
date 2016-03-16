<?php

namespace Modules\Files\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Files extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
