<?php namespace cms\Infrastructure\Abstractions\Requests;

use Illuminate\Foundation\Http\FormRequest as IlluminateFormRequest;
use cms\Infrastructure\Interfaces\Requests\FormRequestInterface;

/**
 * Class FormRequestAbstract
 * @package cms\Infrastructure\Abstractions\Requests
 */
abstract class FormRequestAbstract extends IlluminateFormRequest implements FormRequestInterface
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	abstract public function authorize();

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	abstract public function rules();
}
