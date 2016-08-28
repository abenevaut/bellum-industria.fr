<?php namespace cms\App\Services\Validators;

use Illuminate\Validation\Validator;

/**
 * Class CustomValidator
 * @package cms\App\Services\Validators
 */
class CustomValidator extends Validator
{

	/**
	 * alpha_num_dash_spaces validation rule.
	 *
	 * @param $attribute
	 * @param $value
	 * @param $params
	 *
	 * @return mixed
	 */
	public function validateAlphaNumDashSpaces($attribute, $value, $params)
	{
		return preg_match('/^[0-9-\pL\s---_]+$/u', $value);
	}

}