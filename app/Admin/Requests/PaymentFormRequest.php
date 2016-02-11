<?php

namespace App\Admin\Requests;

use CVEPDB\Requests\Request;

class PaymentFormRequest extends Request
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
            'bank_account_id' => 'required',
            'date' => 'required',
            'bill_id' => 'required',
        ];
    }
}
