<?php

namespace App\CVEPDB\Admin\Requests;

use App\Http\Requests\Request;
use App\CVEPDB\Interfaces\Requests\IFormRequest;
use App\CVEPDB\Admin\Repositories\BankAccountRepository;

class BankAccountFormRequest extends Request implements IFormRequest
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
        return BankAccountRepository::rules();
    }
}
