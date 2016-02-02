<?php

namespace App\CVEPDB\Admin\Repositories;

use Illuminate\Http\Request as Request;

use App\CVEPDB\Admin\Models\BankAccount;

class BankAccountRepository
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [
            'reference' => 'required|unique_with:bank_accounts,reference',
            'iban' => 'required',
            'bic' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return BankAccount::orderBy('id', 'desc')->paginate(50);
    }

    public function all()
    {
        return BankAccount::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return BankAccount::findOrFail($id);
    }

    public function store(Request $request)
    {
        $bank_account = $this->getBankAccountFromRequest($request);
        $bank_account_validator = $this->getBankAccountValidator($bank_account);

        if ($bank_account_validator->passes()) {
            BankAccount::create($bank_account);
        }
        return $bank_account_validator;
    }

    public function getBankAccountFromRequest(Request $request)
    {
        return [
            'reference' => $request->get('reference'),
            'iban' => $request->get('iban'),
            'bic' => $request->get('bic'),
            'status' => $request->get('status'),
        ];
    }

    // Todo : service validation
    public function getBankAccountValidator($inputs)
    {
        return \Validator::make($inputs, self::rules());
    }


}