<?php namespace abenevaut\Http\Request\Backend\Users\Users;

use abenevaut\Infrastructure\Contracts\Request\RequestAbstract;

class UsersFiltersFormRequest extends RequestAbstract
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'name'        => 'max:255',
			'email'       => 'max:255',
		];

		return $rules;
	}
}
