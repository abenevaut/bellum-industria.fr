<?php namespace Core\Http\Requests\Admin;

use Core\Http\Requests\FormRequest as AbsFormRequest;

/**
 * Class SettingsStoreFormRequest
 * @package Core\Http\Requests\Admin
 */
class SettingsStoreFormRequest extends AbsFormRequest
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
			'core_site_name'        => 'required',
			'core_site_description' => 'required',
			'mail_from_address'     => 'required|email',
			'mail_from_name'        => 'required',
//            'mail_driver' => 'required',
//            'mail_host' => 'required',
//            'mail_port' => 'required',
//            'mail_encryption' => 'required',
//            'mail_username' => 'required',
//            'mail_password' => 'required',
		];
	}
}
