<?php namespace cms\Infrastructure\Abstractions\Model;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Prettus\Repository\Contracts\Transformable as PrettusTransformable;
use Prettus\Repository\Traits\TransformableTrait as PrettusTransformableTrait;
use cms\Domain\Logs\Logs\Traits\LogTrait;

/**
 * Class LogModelAbstract
 * @package cms\Infrastructure\Abstractions
 */
abstract class LogModelAbstract extends IlluminateModel implements PrettusTransformable
{

	use PrettusTransformableTrait;
	use LogTrait;

}
