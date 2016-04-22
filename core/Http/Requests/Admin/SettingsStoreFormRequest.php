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
            'CORE_SITE_NAME' => 'required',
            'CORE_SITE_DESCRIPTION' => 'required',
            'CORE_CONTACT_MAIL' => 'required|email',

            'CORE_CONTACT_DISPLAY_NAME' => 'required',
            'CORE_CONTACT_DISPLAY_NAME' => 'required',

            'CORE_MAIL_DRIVER' => 'required',
            'CORE_MAIL_HOST' => 'required',
            'CORE_MAIL_PORT' => 'required',
            'CORE_MAIL_ENCRYPTION' => 'required',
            'CORE_MAIL_USERNAME' => 'required',
            'CORE_MAIL_PASSWORD' => 'required',
        ];
    }
}
