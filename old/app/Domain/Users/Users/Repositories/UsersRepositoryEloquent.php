<?php namespace bellumindustria\Domain\Users\Users\Repositories;

use bellumindustria\App\Services\
{
	HttpCsv
};
use bellumindustria\Infrastructure\Contracts\
{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Users\Users\{
	Repositories\UsersRepositoryInterface,
	User,
	Criterias\EmailLikeCriteria,
	Criterias\FullNameLikeCriteria,
	Criterias\WhereUniqIdIsCriteria,
	Criterias\WhereUniqIdIsDifferentCriteria,
	Events\UserCreatedEvent,
	Events\UserUpdatedEvent,
	Events\UserDeletedEvent,
	Events\UserTriedToDeleteHisOwnAccountEvent,
	Presenters\UsersListPresenter
};
use bellumindustria\Domain\Users\Leads\
{
	Lead
};

class UsersRepositoryEloquent extends RepositoryEloquentAbstract implements UsersRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model(): string
	{
		return User::class;
	}

	/**
	 * Create User request and fire event "UserCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserCreatedEvent
	 * @return \bellumindustria\Domain\Users\Users\User
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function create(array $attributes): User
	{
		if (!array_key_exists('uniqid', $attributes)) {
			$attributes['uniqid'] = uniqid();
		}

		if (!array_key_exists('password', $attributes)) {
			// temporary password
			$attributes['password'] = bcrypt(md5(uniqid()));
		}

		$user = parent::create($attributes);

		event(new UserCreatedEvent($user));

		return $user;
	}

	/**
	 * Update User request and fire event "UserUpdatedEvent".
	 *
	 * @param array $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserUpdatedEvent
	 * @return \bellumindustria\Domain\Users\Users\User
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function update(array $attributes, $id): User
	{
		$user = parent::update($attributes, $id);

		event(new UserUpdatedEvent($user));

		return $user;
	}

	/**
	 * Delete User request and fire event "UserDeletedEvent".
	 *
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserDeletedEvent
	 * @return \bellumindustria\Domain\Users\Users\User
	 */
	public function delete($id): User
	{
		$user = $this->find($id);

		parent::delete($user->id);

		event(new UserDeletedEvent($user));

		return $user;
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function getRoles()
	{
		return collect([
			User::ROLE_ADMINISTRATOR => trans('users.role.' . User::ROLE_ADMINISTRATOR),
			User::ROLE_GAMER => trans('users.role.' . User::ROLE_GAMER),
		]);
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function getCivilities()
	{
		return collect([
			User::CIVILITY_MADAM => trans('users.civility.' . User::CIVILITY_MADAM),
			User::CIVILITY_MISS => trans('users.civility.' . User::CIVILITY_MISS),
			User::CIVILITY_MISTER => trans('users.civility.' . User::CIVILITY_MISTER),
		]);
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function getLocales()
	{
		return collect(User::LOCALES);
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function getTimezones()
	{
		return collect(timezones());
	}

	/**
	 * Get the list of all users, active and soft deleted users.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function allWithTrashed()
	{
		return User::withTrashed()->get();
	}

	/**
	 * Get only users that was soft deleted.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function onlyTrashed()
	{
		return User::onlyTrashed()->get();
	}

	/**
	 * Filter users by uniqid.
	 *
	 * @param string $uniqid The user uniqid
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterByUniqueId($uniqid)
	{
		if (!is_null($uniqid) && !empty($uniqid)) {
			$this->pushCriteria(new WhereUniqIdIsCriteria($uniqid));
		}

		return $this;
	}

	/**
	 * Filter users by uniqid different than the one as argument.
	 *
	 * @param string $uniqid The user uniqid
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterByUniqueIdDifferentThan($uniqid)
	{
		if (!is_null($uniqid) && !empty($uniqid)) {
			$this->pushCriteria(new WhereUniqIdIsDifferentCriteria($uniqid));
		}

		return $this;
	}

	/**
	 * Filter users by name.
	 *
	 * @param string $name The user last name or lead first name
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterByName($name)
	{
		if (!is_null($name) && !empty($name)) {
			$this->pushCriteria(new FullNameLikeCriteria($name));
		}

		return $this;
	}

	/**
	 * Filter users by emails.
	 *
	 * @param string $email The user email
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterByEmail($email)
	{
		if (!is_null($email) && !empty($email)) {
			$this->pushCriteria(new EmailLikeCriteria($email));
		}

		return $this;
	}

	/**
	 * @return User
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function createUser($civility, $first_name, $last_name, $email, $role = User::ROLE_GAMER, $locale = User::DEFAULT_LOCALE, $timezone = User::DEFAULT_TZ)
	{
		return $this
			->create(
				[
					'civility' => $civility,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'email' => $email,
					'role' => $role,
					'locale' => $locale,
					'timezone' => $timezone
				]
			)
			->addProfile()
			->sendCreatedAccountByAdministratorNotification()
		;
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
		return \Validator::make(
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

		$new_user = $this->create($data);

		return $new_user;
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

	/**
	 * @param RequestAbstract $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendIndexView(RequestAbstract $request)
	{
		$users = $this
			->with(['lead'])
			->setPresenter(new UsersListPresenter())
			->paginate();

		return view('backend.users.users.index', [
			'users' => $users
		]);
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendShowView($id)
	{
		$user = $this
			->with(['lead'])
			->setPresenter(new UsersListPresenter())
			->find($id);

		return view('backend.users.users.show', ['user' => $user]);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendCreateView()
	{
		return view(
			'backend.users.users.create',
			[
				'civilities' => $this->getCivilities(),
				'roles' => $this->getRoles(),
				'locales' => $this->getLocales(),
				'locale' => User::DEFAULT_LOCALE,
				'timezones' => $this->getTimezones(),
				'timezone' => User::DEFAULT_TZ,
			]
		);
	}

	/**
	 * @param RequestAbstract $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function backendStoreWithRedirection(RequestAbstract $request)
	{
		try {
			$this
				->createUser(
					$request->get('civility'),
					$request->get('first_name'),
					$request->get('last_name'),
					$request->get('email'),
					$request->get('role'),
					$request->get('locale'),
					$request->get('timezone')
				)
			;
		} catch (\Prettus\Validator\Exceptions\ValidatorException $exception) {
			\Sentry::captureException($exception);
		}

		return redirect(route('backend.users.index'));
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendEditView($id)
	{
		$user = $this
			->setPresenter(new UsersListPresenter())
			->find($id)
		;

		return view('backend.users.users.edit', [
			'user' => $user,
			'civilities' => $this->getCivilities(),
			'roles' => $this->getRoles(),
			'locales' => $this->getLocales(),
			'timezones' => $this->getTimezones(),
		]);
	}

	/**
	 * @param RequestAbstract $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 *
	 * @throws
	 */
	public function backendUpdateWithRedirection(RequestAbstract $request, $id)
	{
		try {
			$this
				->update(
					[
						'role' => $request->get('role'),
						'civility' => $request->get('civility'),
						'first_name' => $request->get('first_name'),
						'last_name' => $request->get('last_name'),
						'email' => $request->get('email'),
						'locale' => $request->get('locale'),
						'timezone' => $request->get('timezone'),
					],
					$id
				)
				->updateProfile()
			;
		} catch (\Prettus\Validator\Exceptions\ValidatorException $exception) {
			\Sentry::captureException($exception);
		}

		return redirect(route('backend.users.index'));
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function backendDestroyWithRedirection($id)
	{
		if ((int)$id === \Auth::user()->id) {
			event(new UserTriedToDeleteHisOwnAccountEvent(\Auth::user()));
			return redirect(route('backend.users.index'));
		}

		$this->delete($id);

		return redirect(route('backend.users.index'));
	}

	/**
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function backendUsersExportWithCsvOutput()
	{
		$this->with(['lead']);

		$csv = new HttpCsv();
		$csv->httpHeaders(trans('users.export_sheet_title', ['date' => date('Y-m-d_H-i-s')]));

		$nb_users = $this->count();

		$csv->openStream();
		$csv->writeRow([
			trans('global.id'),
			trans('users.civility'),
			trans('users.last_name'),
			trans('users.first_name'),
			trans('profiles.family_situation'),
			trans('profiles.maiden_name'),
			trans('profiles.birth_date'),
			trans('global.email'),
			trans('users.role'),
			trans('users.locale'),
			trans('users.timezone'),
		]);

		$this
			->all()
			->each(function ($model) use ($csv) {
				$csv->writeRow([
					$model->uniqid,
					trans('users.civility.' . $model->civility),
					$model->last_name,
					$model->first_name,
					trans('profiles.family_situation.'.$model->profile->family_situation),
					$model->profile->maiden_name,
					$model->profile->birth_date_carbon->format(trans('global.date_format')),
					$model->email,
					trans('users.role.' . $model->role),
					$model->locale,
					$model->timezone,
				]);
			});

		$csv->writeRow([trans('users.export_total_user', ['nb_users' => $nb_users])]);
		$csv->closeStream();
		exit;
	}

	/**
	 * @param RequestAbstract $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajaxIndexJson(RequestAbstract $request)
	{
		if (
			\Gate::allows(User::ROLE_GAMER, \Auth::user())
			|| \Gate::allows(User::ROLE_ADMINISTRATOR, \Auth::user())
		) {
			return abort(403);
		}

		$data = $this
			->setPresenter(new UsersListPresenter())
			->scopeQuery(function ($model) use ($request) {
				return $model
					->where(function ($query) use ($request) {

						if ($request->has('user_id')) {
							$query->where('id', '=', $request->get('user_id'));
						}

						if ($request->has('users_ids')) {
							$query->whereIn('id', $request->get('users_ids'));
						}

						if ($request->has('term')) {
							$query->where(function ($query) use ($request) {
								$query
									->where('last_name', 'LIKE', '%' . $request->get('term') . '%')
									->orWhere('first_name', 'LIKE', '%' . $request->get('term') . '%')
									->orWhere('email', 'LIKE', '%' . $request->get('term') . '%');
							});
						}
					});
			})
			->paginate();

		return response()->json($data);
	}

	/**
	 * @param RequestAbstract $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajaxCheckUserEmailJson(RequestAbstract $request)
	{
		try {
			$data['data']['count'] = $this
				->skipPresenter()
				->filterByEmail($request->get('email'))
				->filterByUniqueIdDifferentThan($request->get('not_user_id'))
				->scopeQuery(function ($model) use ($request) {
					// we need to return trashed items because email field is
					// unique. Like this, we make sure to do not validate an
					// email already existing for a soft deleted user.
					return $model->withTrashed();
				})
				->count();
		} catch (\Prettus\Repository\Exceptions\RepositoryException $exception) {
			\Sentry::captureException($exception);
		}

		return response()->json($data);
	}
}
