<?php namespace abenevaut\Http\Controllers\Auth;

use abenevaut\Domain\Users\Users\User;

trait AuthRedirectTrait
{

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/customer/dashboard';

	/**
	 * Where to redirect administrators after login.
	 *
	 * @var string
	 */
	protected $redirectToBackend = '/backend/dashboard';

	/**
	 * @return string
	 */
	public function redirectTo()
	{
		if (User::ROLE_ADMINISTRATOR === \Auth::user()->role) {
			return $this->redirectToBackend;
		}

		return $this->redirectTo;
	}
}
