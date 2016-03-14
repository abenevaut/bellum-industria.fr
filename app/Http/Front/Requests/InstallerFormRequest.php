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

//            'MAIL_FROM_EMAIL' => 'required|email',
//            'MAIL_FROM_NAME' => 'required',
//            'MAIL_DRIVER' => '',
//            'MAIL_HOST' => '',
//            'MAIL_PORT' => '',
//            'MAIL_USERNAME' => '',
//            'MAIL_PASSWORD' => '',
//            'MAIL_ENCRYPTION' => ''
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

            'APP_URL.required' => 'You have to specify the web application url',

            'first_name.required' => 'You have to specify the web application url',
            'last_name.required' => 'You have to specify the web application url',
            'email.required' => 'You have to specify the web application url',
            'password.required' => 'You have to specify the web application url',

            'DB_HOST.required' => 'You have to specify the web application url',
            'DB_DATABASE.required' => 'You have to specify the web application url',
            'DB_USERNAME.required' => 'You have to specify the web application url',
            'DB_PASSWORD.required' => 'You have to specify the web application url',

            'MAIL_FROM_EMAIL.required' => 'You have to specify the web application url',
            'MAIL_FROM_NAME.required' => 'You have to specify the web application url',
            'MAIL_DRIVER.required' => 'You have to specify the web application url',
            'MAIL_HOST.required' => 'You have to specify the web application url',
            'MAIL_PORT.required' => 'You have to specify the web application url',
            'MAIL_USERNAME.required' => 'You have to specify the web application url',
            'MAIL_PASSWORD.required' => 'You have to specify the web application url',
            'MAIL_ENCRYPTION.required' => 'You have to specify the web application url',

        ];
    }
}
