<?php

namespace panacea\Infrastructure\Contracts\Model;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ModelAbstract
 * @package panacea\Infrastructure\Contracts\Model
 */
abstract class ModelAbstract implements Transformable
{

	use TransformableTrait;

}
