<?php namespace Modules\Users\Http\Requests\Admin;

use Core\Http\Requests\FormRequest;

class UserMultiDestroyFormRequest extends FormRequest
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
			'users_multi_destroy' => 'required'
		];
	}
}
