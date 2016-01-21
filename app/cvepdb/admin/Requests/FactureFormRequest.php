<?php

namespace App\CVEPDB\Vitrine\Requests;

use App\Http\Requests\Request;

class FactureFormRequest extends Request
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
            'vendeur_name' => 'required',
            'vendeur_adress' => 'required',
            'vendeur_zipcode' => 'required',
            'vendeur_city' => 'required',
            'vendeur_country' => 'required',
            'vendeur_phone' => 'required',
            'vendeur_mail' => 'required|email',
            'vendeur_siret' => 'required',

            'acheteur_name' => 'required',
            'acheteur_adress' => 'required',
            'acheteur_zipcode' => 'required',
            'acheteur_city' => 'required',
            'acheteur_country' => 'required',
            'acheteur_phone' => '',
            'acheteur_mail' => 'email',
            'acheteur_siret' => 'required',

            'facture_numero' => 'required',
            'facture_currency' => 'required',
            'facture_date_emission' => 'required',
            'facture_description_header' => 'required',

            'facture_column_designation' => 'required',
            'facture_column_quantity' => 'required',
            'facture_column_unit_price_without_vat' => 'required',
            'facture_column_price_without_vat' => 'required',
            'facture_column_amount_vat' => 'required',

            'facture_description_footer' => '',

        ];
    }
}
