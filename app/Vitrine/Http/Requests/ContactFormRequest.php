<?php namespace App\Vitrine\Http\Requests;

use Core\Http\Requests\FormRequest;

/**
 * Class ContactFormRequest
 * @package App\Vitrine\Http\Requests
 */
class ContactFormRequest extends FormRequest
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
			'first_name' => 'required',
			'last_name'  => 'required',
			'email'      => 'required|email',
			'message'    => 'required',
		];
	}
}
