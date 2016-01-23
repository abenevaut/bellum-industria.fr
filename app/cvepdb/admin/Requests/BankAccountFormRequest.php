<?php

namespace App\CVEPDB\Admin\Requests;

use App\Http\Requests\Request;

class BankAccountFormRequest extends Request
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
            'reference' => 'required',
            'iban' => 'required',
            'bic' => 'required',
            'status' => 'required',
        ];
    }
}
