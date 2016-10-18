<?php namespace cms\Infrastructure\Abstractions\Model;;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class AuthenticatableModelAbstract
 * @package cms\Infrastructure\Abstractions\Model
 */
abstract class AuthenticatableModelAbstract extends Authenticatable implements Transformable
{

	use TransformableTrait;
	use Authorizable;

}
