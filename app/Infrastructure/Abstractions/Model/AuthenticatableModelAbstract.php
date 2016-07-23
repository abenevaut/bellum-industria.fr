<?php

namespace panacea\Infrastructure\Contracts\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * Class AuthenticatableModelAbstract
 * @package panacea\Infrastructure\Contracts\Model
 */
abstract class AuthenticatableModelAbstract extends Authenticatable implements Transformable
{

	use TransformableTrait;
	use EntrustUserTrait;

}
