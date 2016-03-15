<?php

namespace App\Http\Front\Requests;

use CVEPDB\Requests\Request;

class InstallerFormRequest extends Request
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
            'APP_URL' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'DB_HOST' => 'required',
            'DB_DATABASE' => 'required',
            'DB_USERNAME' => 'required',
            'DB_PASSWORD' => 'required',
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
            'APP_URL.required' => 'installer.error:field_required',
            'first_name.required' => 'installer.error:field_required',
            'last_name.required' => 'installer.error:field_required',
            'email.required' => 'installer.error:field_required',
            'email.email' => 'installer.error:field_email',
            'password.required' => 'installer.error:field_required',
            'DB_HOST.required' => 'installer.error:field_required',
            'DB_DATABASE.required' => 'installer.error:field_required',
            'DB_USERNAME.required' => 'installer.error:field_required',
            'DB_PASSWORD.required' => 'installer.error:field_required',
        ];
    }
}
