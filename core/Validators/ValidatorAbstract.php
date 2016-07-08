<?php namespace Core\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

/**
 * Class TestValidator
 * @package Core\Validators
 */
abstract class ValidatorAbstract extends LaravelValidator
{

	protected $rules = [
		ValidatorInterface::RULE_CREATE => [],
		ValidatorInterface::RULE_UPDATE => [],
	];

}
