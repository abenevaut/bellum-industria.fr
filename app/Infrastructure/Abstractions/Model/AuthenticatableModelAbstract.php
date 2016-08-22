<?php namespace cms\Infrastructure\Abstractions\Model;;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * Class AuthenticatableModelAbstract
 * @package cms\Infrastructure\Contracts\Model
 */
abstract class AuthenticatableModelAbstract extends Authenticatable implements Transformable
{

	use TransformableTrait;
	use EntrustUserTrait;

	use Authorizable {
		EntrustUserTrait::can insteadof Authorizable;
		Authorizable::can as hasPermission;
	}

}
