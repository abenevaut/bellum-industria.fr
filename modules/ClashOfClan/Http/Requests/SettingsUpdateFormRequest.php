<?php namespace Modules\ClashOfClan\Http\Requests;

use Core\Http\Requests\FormRequest;

/**
 * Class SettingsUpdateFormRequest
 * @package Modules\ClashOfClan\Http\Requests
 */
class SettingsUpdateFormRequest extends FormRequest
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
            'api_key' => 'required'
        ];
    }
}
