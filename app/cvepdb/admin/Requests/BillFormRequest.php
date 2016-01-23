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
            'vendor_id' => 'required',
            'client_id' => 'required',

            'facture_numero' => 'required',
            'facture_currency' => 'required',
            'facture_date_emission' => 'required',

            'facture_column_designation' => 'required',
            'facture_column_quantity' => 'required',
            'facture_column_unit_price_without_vat' => 'required',
            'facture_column_price_without_vat' => 'required',
            'facture_column_amount_vat' => 'required',

        ];
    }
}
