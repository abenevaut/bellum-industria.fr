<?php

namespace bellumindustria\Domain\Users\Users\Repositories;

use Illuminate\
{
	Support\Facades\Validator
};
use bellumindustria\Infrastructure\Contracts\
{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Users\Users\
{
	User,
	Repositories\UsersRepositoryInterface,
	Events\UserCreatedEvent,
	Events\UserUpdatedEvent,
	Events\UserDeletedEvent,
	Presenters\UsersListPresenter,
	Criterias\EmailLikeCriteria
};

class UsersRepositoryEloquent extends RepositoryEloquentAbstract implements UsersRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model() {
		return User::class;
	}

	/**
	 * Create user and fire event "UserCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserUpdatedEvent
	 * @return \bellumindustria\Domain\Users\Users\User
	 */
	public function create(array $attributes) {
		$user = parent::create($attributes);

		event(new UserCreatedEvent($user));

		return $user;
	}

	/**
	 * Update user and fire event "UserUpdatedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $user_id
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserUpdatedEvent
	 * @return \bellumindustria\Domain\Users\Users\User
	 */
	public function update(array $attributes, $user_id) {
		$user = parent::update($attributes, $user_id);

		event(new UserUpdatedEvent($user));

		return $user;
	}

	/**
	 * Delete user and fire event "UserDeletedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserDeletedEvent
	 * @return int
	 */
	public function delete($id) {
		$user = $this->find($id);

		event(new UserDeletedEvent($user));

		return parent::delete($user->id);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param array $data Incoming data from registration form
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 * @seealso bellumindustria\Http\Controllers\Auth\RegisterController
	 * @seealso authRegistration
	 */
	public function authRegistrationValidator(array $data) {
		return Validator::make(
			$data,
			[
				'email'    => 'required|string|email|max:255|unique:users',
				'password' => 'required|string|min:6|confirmed',
			]
		);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param array $data Incoming data from registration form
	 *
	 * @return User
	 * @seealso bellumindustria\Http\Controllers\Auth\RegisterController
	 * @seealso authRegistrationValidator
	 */
	public function authRegistration(array $data) {

		$new_user = $this
			->create($data);

		return $new_user;
	}

	/**
	 * Filter users by emails.
	 *
	 * @param string $email
	 *
	 * @return $this
	 */
	public function filterByEmail($email) {

		if (!is_null($email) && !empty($email))
		{
			$this->pushCriteria(new EmailLikeCriteria($email));
		}

		return $this;
	}

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\Response
	 * @seealso bellumindustria\Http\Controllers\Auth\RegisterController
	 */
	public function frontendShowRegistrationForm() {
		return view('auth.register');
	}
}
