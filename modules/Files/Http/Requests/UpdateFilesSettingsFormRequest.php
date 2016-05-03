<?php namespace Modules\Files\Http\Requests;

use Core\Http\Requests\FormRequest;

/**
 * Class UpdateFilesSettingsFormRequest
 * @package Modules\Files\Http\Requests
 */
class UpdateFilesSettingsFormRequest extends FormRequest
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
        ];
    }
}
