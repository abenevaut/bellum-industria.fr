<?php

namespace bellumindustria\Http\Request\Frontend\Contacts;

use bellumindustria\Infrastructure\Contracts\Request\RequestAbstract;

class ContactRequest extends RequestAbstract
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$rules = [
			'email'   => 'required|email',
			'subject' => 'required',
			'message' => 'required',
		];

		return $rules;
	}
}
