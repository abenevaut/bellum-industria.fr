<?php namespace cms\Infrastructure\Abstractions\Model;

use cms\Infrastructure\Abstractions\Model\ModelAbstract;
use cms\Domain\Logs\Logs\Traits\LogTrait;

/**
 * Class LogModelAbstract
 * @package cms\Infrastructure\Abstractions\Model
 */
abstract class LogModelAbstract extends ModelAbstract
{

	use LogTrait;

}
