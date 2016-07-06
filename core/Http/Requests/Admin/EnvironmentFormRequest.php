<?php namespace Core\Http\Requests\Admin;

use Core\Http\Requests\FormRequest as AbsFormRequest;

/**
 * Class EnvironmentFormRequest
 * @package Core\Http\Requests\Admin
 */
class EnvironmentFormRequest extends AbsFormRequest
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
			'name'      => 'required',
			'reference' => 'alpha_dash|required|unique:environments,reference'
				. ((($this->method() === 'PUT') && ($id > 0)) ? ',' . $id : ''),
			'domain'    => 'required',
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'reference.unique' => 'validations.environments.reference:unique',
		];
	}
}
