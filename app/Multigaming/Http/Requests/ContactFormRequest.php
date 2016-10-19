<?php namespace cms\Multigaming\Http\Requests;

use cms\Infrastructure\Abstractions\Requests\FormRequestAbstract;

/**
 * Class ContactFormRequest
 * @package cms\VitrMultigaming\Http\Requests
 */
class ContactFormRequest extends FormRequestAbstract
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
