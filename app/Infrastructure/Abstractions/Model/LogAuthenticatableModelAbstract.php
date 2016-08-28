<?php namespace cms\Infrastructure\Abstractions\Model;

use cms\Infrastructure\Abstractions\Model\AuthenticatableModelAbstract;
use cms\Domain\Logs\Logs\Traits\LogTrait;

/**
 * Class LogAuthenticatableModelAbstract
 * @package cms\Infrastructure\Contracts\Model
 */
abstract class LogAuthenticatableModelAbstract extends AuthenticatableModelAbstract
{

	use LogTrait;

}
