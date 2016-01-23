<?php

namespace App\CVEPDB\Admin\Controllers;

use App\CVEPDB\Admin\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Admin\Requests\BillFormRequest as BillFormRequest;

class BillController extends Controller
{
    public function index()
    {
        return view(
            'cvepdb.admin.bills.index',
            [
                'bills' => []
            ]
        );
    }

    public function create()
    {
        return view('cvepdb.admin.bills.create');
    }

    public function store(BillFormRequest $request)
    {
        $data = [
            'vendor_id' => $request->get('vendor_id'),
            'client_id' => $request->get('client_id'),

            'reference' => $request->get('reference'),
            'currency' => $request->get('currency'),
            'date_emission' => $request->get('date_emission'),

            'designation' => $request->get('designation'),
            'quantity' => $request->get('quantity'),
            'unit_price_without_vat' => $request->get('unit_price_without_vat'),
            'price_without_vat' => $request->get('price_without_vat'),
            'amount_vat' => $request->get('amount_vat'),
        ];

        dd($data);

        return \PDF::loadView('cvepdb.admin.pdf.invoice', $data)->stream('bill.pdf');
    }
}