<?php namespace Modules\Users\Http\Requests\Admin;

use Core\Http\Requests\FormRequest;

class UserFormRequest extends FormRequest
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
		$id = $this->method() === 'PUT'  // only if updating
			? $this->segment(3)
			: 0;

		return [
			'first_name' => 'required|max:50',
			'last_name' => 'required|max:50',
			'email' => 'required|email|max:255|unique:users,email' . ((($this->method() === 'PUT') && ($id > 0)) ? ',' . $id : ''),
		];
	}
}
