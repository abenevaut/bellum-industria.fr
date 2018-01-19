<?php namespace bellumindustria\Http\Request\Ajax\Users\Profiles;

use bellumindustria\Infrastructure\Contracts\Request\RequestAbstract;

class IsSidebarPinedFormRequest extends RequestAbstract
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
			'is_sidebar_pined' => 'required|boolean'
		];

		return $rules;
	}
}
