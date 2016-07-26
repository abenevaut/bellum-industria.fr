<?php namespace cms\Infrastructure\Abstractions;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Prettus\Repository\Contracts\Transformable as PrettusTransformable;
use Prettus\Repository\Traits\TransformableTrait as PrettusTransformableTrait;
use cms\Domain\Logs\Logs\Traits\LogTrait;

/**
 * Class ModelAbstract
 * @package cms\Infrastructure\Abstractions
 */
abstract class ModelAbstract extends IlluminateModel implements PrettusTransformable
{

	use PrettusTransformableTrait;
	use LogTrait;

}
