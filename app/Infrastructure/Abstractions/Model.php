<?php namespace CVEPDB\Abstracts\Entities;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Prettus\Repository\Contracts\Transformable as PrettusTransformable;
use Prettus\Repository\Traits\TransformableTrait as PrettusTransformableTrait;

/**
 * Class Model
 * @package CVEPDB\Abstracts\Entities
 */
class Model extends IlluminateModel implements PrettusTransformable
{

	use PrettusTransformableTrait;
}
