<?php

namespace App\CVEPDB\Admin\Requests;

use App\Http\Requests\Request;

class EntiteFormRequest extends Request
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
            'name' => 'required',
            'siret' => 'required',
            'email' => 'required|email',
            'phone' => '',

            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'country' => 'required',

            'type' => 'required',
            'status' => 'required',
        ];
    }
}
