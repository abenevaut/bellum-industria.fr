<?php

namespace App\Admin\Requests;

use CVEPDB\Requests\Request;
use App\CVEPDB\Admin\Repositories\BankAccountRepository;

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
            'reference' => 'required|unique_with:bank_accounts,reference',
            'iban' => 'required',
            'bic' => 'required',
            'status' => 'required',
        ];
    }
}
