<?php namespace Modules\Users\Http\Requests\Admin;

use Core\Http\Requests\FormRequest;

/**
 * Class RoleFormRequest
 * @package Modules\Users\Http\Requests\Admin
 */
class RoleFormRequest extends FormRequest
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
			'name' => 'required|unique:roles,name' . ((($this->method() === 'PUT') && ($id > 0)) ? ',' . $id : ''),
			'display_name' => 'required',
			'description' => 'required'
		];
	}
}
