<?php

namespace App\CVEPDB\Vitrine\Controllers\Admin;

use App\CVEPDB\Vitrine\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Vitrine\Requests\FactureFormRequest as FactureFormRequest;

class FactureController extends Controller
{
    public function getIndex()
    {
        return view('cvepdb.vitrine.admin.facture_new');
    }

    public function postGenerate(FactureFormRequest $request)
    {
        $data = [
            'vendeur_name' => $request->get('vendeur_name'),
            'vendeur_adress' => $request->get('vendeur_adress'),
            'vendeur_zipcode' => $request->get('vendeur_zipcode'),
            'vendeur_city' => $request->get('vendeur_city'),
            'vendeur_country' => $request->get('vendeur_country'),
            'vendeur_phone' => $request->get('vendeur_phone'),
            'vendeur_mail' => $request->get('vendeur_mail'),
            'vendeur_siret' => $request->get('vendeur_siret'),

            'acheteur_name' => $request->get('acheteur_name'),
            'acheteur_adress' => $request->get('acheteur_adress'),
            'acheteur_zipcode' => $request->get('acheteur_zipcode'),
            'acheteur_city' => $request->get('acheteur_city'),
            'acheteur_country' => $request->get('acheteur_country'),
            'acheteur_phone' => $request->get('acheteur_phone'),
            'acheteur_mail' => $request->get('acheteur_mail'),
            'acheteur_siret' => $request->get('acheteur_siret'),

            'facture_numero' => $request->get('facture_numero'),
            'facture_currency' => $request->get('facture_currency'),
            'facture_date_emission' => $request->get('facture_date_emission'),
            'facture_description_header' => $request->get('facture_description_header'),

            'facture_column_designation' => $request->get('facture_column_designation'),
            'facture_column_quantity' => $request->get('facture_column_quantity'),
            'facture_column_unit_price_without_vat' => $request->get('facture_column_unit_price_without_vat'),
            'facture_column_price_without_vat' => $request->get('facture_column_price_without_vat'),
            'facture_column_amount_vat' => $request->get('facture_column_amount_vat'),

            'facture_description_footer' => $request->get('facture_description_footer'),
        ];

        return \PDF::loadView('cvepdb.vitrine.pdf.invoice', $data)->stream('facture.pdf');
    }
}