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
            'core.site.name' => 'required',
            'core.site.description' => 'required',
            'mail.from.address' => 'required|email',
            'mail.from.name' => 'required',
            'mail.driver' => 'required',
            'mail.host' => 'required',
            'mail.port' => 'required',
            'mail.encryption' => 'required',
            'mail.username' => 'required',
            'mail.password' => 'required',
        ];
    }
}
