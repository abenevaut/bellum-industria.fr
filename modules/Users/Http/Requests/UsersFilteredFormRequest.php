<?php namespace Modules\Users\Http\Requests;

use Core\Http\Requests\FormRequest;

class UsersFilteredFormRequest extends FormRequest
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
		return [
			'first_name' => '',
			'last_name' => '',
			'email' => ''
		];
	}
}
