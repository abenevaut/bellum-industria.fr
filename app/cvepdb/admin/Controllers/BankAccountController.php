<?php

namespace App\CVEPDB\Admin\Controllers;

use App\CVEPDB\Admin\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Admin\Requests\BankAccountFormRequest as BankAccountFormRequest;
use App\CVEPDB\Admin\Models\BankAccount;

class BankAccountController extends Controller
{
    public function index()
    {
        return view(
            'cvepdb.admin.bankaccounts.index',
            [
                'bankaccounts' => BankAccount::all()
            ]
        );
    }

    public function create()
    {
        return view('cvepdb.admin.bankaccounts.create');
    }

    public function store(BankAccountFormRequest $request)
    {
        BankAccount::create([
            'reference' => $request->get('reference'),
            'iban' => $request->get('iban'),
            'bic' => $request->get('bic'),
            'status' => $request->get('status'),
        ]);
        return redirect('admin/bankaccounts');
    }

    public function postAjaxGetBankAccount()
    {
        return ['results' => BankAccount::all()];
    }
}