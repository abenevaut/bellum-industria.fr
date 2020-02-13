<?php namespace bellumindustria\Http\Request\Backend\Users\Profiles;

use bellumindustria\Infrastructure\Contracts\Request\RequestAbstract;
use bellumindustria\Domain\Users\Users\User;
use bellumindustria\Domain\Users\Profiles\Profile;

class ProfileFormRequest extends RequestAbstract
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
		$id = $this->method() === 'PUT'  // only if updating
			? $this->segment(3)
			: 0;

		$rules = [
			'birth_date' => 'date_format:"'.trans('global.date_format').'"',
			'family_situation' => 'in:'
				. Profile::FAMILY_SITUATION_SINGLE . ','
				. Profile::FAMILY_SITUATION_MARRIED . ','
				. Profile::FAMILY_SITUATION_CONCUBINAGE . ','
				. Profile::FAMILY_SITUATION_DIVORCEE . ','
				. Profile::FAMILY_SITUATION_WIDOW_ER,
			'maiden_name' => 'max:100',
			'timezone' => 'required|in:' . collect(timezones())->implode(','),

//			'email.*' => 'email|max:80|unique:users,email|unique:profiles_emails,email'
//				. (
//				(($this->method() === 'PUT') && ($id > 0))
//					? ',' . $id
//					: ''
//				),


		];

		return $rules;
	}
}
