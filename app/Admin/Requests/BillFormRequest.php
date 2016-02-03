<?php

namespace App\CVEPDB\Admin\Requests;

use App\Http\Requests\Request;

class BillFormRequest extends Request
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
            'entite_vendor_id' => 'required',
            'entite_client_id' => 'required',

            'description' => 'required',
            'reference' => 'required',
            'currency' => 'required',
            'date_emission' => 'required',

            'designation' => 'required',
            'quantity' => 'required',
            'unit_price_without_vat' => 'required',
            'price_without_vat' => 'required',
            'amount_vat' => 'required',
        ];
    }
}
