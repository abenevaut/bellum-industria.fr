<?php namespace Modules\Users\Http\Requests;

use CVEPDB\Requests\Request;

class UsersMultiDestroyAdminFormRequest extends Request
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
            'users_multi_destroy' => 'required'
        ];
    }
}
