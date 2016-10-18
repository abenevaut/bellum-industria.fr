<?php namespace cms\Infrastructure\Abstractions\Model;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Prettus\Repository\Contracts\Transformable as PrettusTransformable;
use Prettus\Repository\Traits\TransformableTrait as PrettusTransformableTrait;

/**
 * Class ModelAbstract
 * @package cms\Infrastructure\Abstractions\Model
 */
abstract class ModelAbstract extends IlluminateModel implements PrettusTransformable
{

	use PrettusTransformableTrait;

}
