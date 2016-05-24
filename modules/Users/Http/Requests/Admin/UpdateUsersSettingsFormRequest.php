<?php namespace Modules\Users\Http\Requests;

use Core\Http\Requests\FormRequest;

/**
 * Class UpdateUsersSettingsFormRequest
 * @package Modules\Users\Http\Requests
 */
class UpdateUsersSettingsFormRequest extends FormRequest
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
			'social_login' => 'array'
			//. '|in:' . \Modules\Dashboard\Repositories\SettingsRepository::DASHBOARD_WIDGET_STATUS_ACTIVE
		];
	}
}
