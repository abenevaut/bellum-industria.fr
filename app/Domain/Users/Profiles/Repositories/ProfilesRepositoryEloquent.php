<?php namespace bellumindustria\Domain\Users\Profiles\Repositories;

use Illuminate\Container\Container as Application;
use bellumindustria\Infrastructure\
{
	Contracts\Request\RequestAbstract,
	Contracts\Repositories\RepositoryEloquentAbstract
};
use bellumindustria\Domain\Users\
{
	Users\User,
	Profiles\Profile,
	ProfilesEmails\ProfileEmail,
	ProfilesPhones\ProfilePhone,
	Profiles\Events\ProfileUpdatedEvent,
	Profiles\Presenters\ProfilesListPresenter,
	Profiles\Repositories\ProfilesRepository,
	Users\Repositories\UsersRepositoryEloquent
};
use Carbon\Carbon;

class ProfilesRepositoryEloquent extends RepositoryEloquentAbstract implements ProfilesRepository
{

	/**
	 * @var array Family situation available to fill family_situation field in profiles table.
	 */
	protected $family_situations = [
		Profile::FAMILY_SITUATION_SINGLE => 'profiles.family_situation.' . Profile::FAMILY_SITUATION_SINGLE,
		Profile::FAMILY_SITUATION_MARRIED => 'profiles.family_situation.' . Profile::FAMILY_SITUATION_MARRIED,
		Profile::FAMILY_SITUATION_CONCUBINAGE => 'profiles.family_situation.' . Profile::FAMILY_SITUATION_CONCUBINAGE,
		Profile::FAMILY_SITUATION_DIVORCEE => 'profiles.family_situation.' . Profile::FAMILY_SITUATION_DIVORCEE,
		Profile::FAMILY_SITUATION_WIDOW_ER => 'profiles.family_situation.' . Profile::FAMILY_SITUATION_WIDOW_ER,
	];

	/**
	 * @var UsersRepositoryEloquent|null
	 */
	protected $r_users = null;

	/**
	 * LeadsRepositoryEloquent constructor.
	 *
	 * @param Application $app
	 * @param UsersRepositoryEloquent $r_users
	 */
	public function __construct(Application $app, UsersRepositoryEloquent $r_users)
	{
		parent::__construct($app);

		$this->r_users = $r_users;
	}

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Profile::class;
	}

	/**
	 * Create trainer profile.
	 *
	 * @param array $attributes
	 *
	 * @event None
	 * @return \bellumindustria\Domain\Users\Profiles\Profile
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function create(array $attributes)
	{
		$profile = parent::create($attributes);

		return $profile;
	}

	/**
	 * Update trainer profile.
	 *
	 * @param array $attributes
	 * @param integer $id
	 *
	 * @event ProfileUpdatedEvent
	 * @return \bellumindustria\Domain\Users\Profiles\Profile
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function update(array $attributes, $id)
	{
		$profile = parent::update($attributes, $id);

		event(new ProfileUpdatedEvent($profile));

		return $profile;
	}

	/**
	 * Delete trainer profile.
	 *
	 * @param $id
	 *
	 * @event None
	 * @return int
	 */
	public function delete($id)
	{
		$profile = parent::delete($id);

		return $profile;
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function getFamillySituationsList()
	{
		return collect($this->family_situations)
			->map(function ($translation_key, $family_situation_key) {
				return trans($translation_key);
			});
	}

	/**
	 * Get emails profile.
	 *
	 * @param Profile $profile
	 *
	 * @return mixed
	 */
	public function getProfileEmails(User $user)
	{
		$emails = [];

		if ($user->profile) {
			$emails = ProfileEmail::where('profile_id', '=', $user->profile->id)->get();
		}

		return $emails;
	}

	/**
	 * Get phones profile.
	 *
	 * @param Profile $profile
	 *
	 * @return mixed
	 */
	public function getProfilePhones(User $user)
	{
		$phones = [];

		if ($user->profile) {
			$phones = ProfilePhone::where('profile_id', '=', $user->profile->id)->get();
		}

		return $phones;
	}

	/**
	 * Allow to attach one email to a profile.
	 *
	 * @param                $email
	 * @param Profile $profile
	 *
	 * @return ProfileEmail
	 */
	public function profileAttachEmailToProfile($email, Profile $profile)
	{
		// Is the mail already recorded ?
		$email_row = ProfileEmail::where('email', '=', $email)
			->where('profile_id', '=', $profile->id)
			->first();

		if (is_null($email_row)) {
			$email_row = ProfileEmail::create([
				'email' => $email,
				'profile_id' => $profile->id
			]);
		}

		return $email_row;
	}

	/**
	 * Allow to attach many email to a profile.
	 *
	 * @param         $emails
	 * @param Profile $profile
	 *
	 * @return $this
	 */
	public function profileAttachEmailsToProfile($emails, Profile $profile)
	{
		$this_repo = $this;

		collect($emails)
			->map(function ($email) use (&$this_repo, $profile) {
				return $this_repo->profileAttachEmailToProfile($email, $profile);
			});

		return $this;
	}

	/**
	 * Allow to detach emails of a profile.
	 *
	 * @param Profile $profile
	 *
	 * @return $this
	 */
	public function profileDetachEmailsOfProfile(Profile $profile)
	{
		ProfileEmail::where('profile_id', '=', $profile->id)->delete();

		return $this;
	}

	/**
	 * Allow to attach one phone to a profile.
	 *
	 * @param                 $phone
	 * @param Profile $profile
	 *
	 * @return ProfilePhone
	 */
	public function profileAttachPhoneToProfile($phone, Profile $profile)
	{
		// Is the phone already recorded ?
		$phone_row = ProfilePhone::where('phone', '=', $phone)
			->where('profile_id', '=', $profile->id)
			->first();

		if (is_null($phone_row)) {
			$phone_row = ProfilePhone::create([
				'phone' => $phone,
				'profile_id' => $profile->id
			]);
		}

		return $phone_row;
	}

	/**
	 * Allow to attach many phone to a profile.
	 *
	 * @param         $phones
	 * @param Profile $profile
	 *
	 * @return $this
	 */
	public function profileAttachPhonesToProfile($phones, Profile $profile)
	{
		$this_repo = $this;

		collect($phones)
			->map(function ($phone) use (&$this_repo, $profile) {
				return $this_repo->profileAttachPhoneToProfile($phone, $profile);
			});

		return $this;
	}

	/**
	 * Allow to detach phones of a profile.
	 *
	 * @param Profile $profile
	 *
	 * @return $this
	 */
	public function profileDetachPhonesOfProfile(Profile $profile)
	{
		ProfilePhone::where('profile_id', '=', $profile->id)->delete();

		return $this;
	}

	/**
	 * @param User $user
	 * @param array $parameters
	 * @param array $emails
	 * @param array $phones
	 *
	 * @return User
	 */
	public function createUserProfile(
		User $user,
		$parameters = [],
		$emails = [],
		$phones = []
	) {
		$profile = $this
			->create(
				array_merge(
					[
						'user_id' => $user->id
					],
					$parameters
				)
			);

		$this
			->profileAttachEmailsToProfile($emails, $profile)
			->profileAttachPhonesToProfile($phones, $profile);

		return $user;
	}

	/**
	 * @param User $user
	 * @param array $parameters
	 * @param array $emails
	 * @param array $phones
	 *
	 * @return User
	 */
	public function updateUserProfile(
		User $user,
		$parameters = [],
		$emails = [],
		$phones = []
	) {
		$this->update($parameters, $user->profile->id);
		$this
			->profileDetachEmailsOfProfile($user->profile)
			->profileAttachEmailsToProfile($emails, $user->profile)
			->profileDetachPhonesOfProfile($user->profile)
			->profileAttachPhonesToProfile($phones, $user->profile);

		return $user;
	}

	/**
	 * @param User $user
	 */
	public function deleteUserProfile(User $user)
	{
		$user->profile->delete();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendIndexView()
	{
		$profile = $this->getCurrentUserProfile();

		return view('backend.users.profiles.index', [
			'profile' => $profile,
			'families_situations' => $this->getFamillySituationsList(),
			'timezones' => $this->r_users->getTimezones(),
		]);
	}

	/**
	 * @param RequestAbstract $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function backendUpdateWithRedirection(RequestAbstract $request, $id)
	{
		$this->updateUserProfileWithRequest($request, $id);

		return redirect(route('backend.users.profile.index'));
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function accountantIndexView()
	{
		$profile = $this->getCurrentUserProfile();

		return view('accountant.users.profiles.index', [
			'profile' => $profile,
			'families_situations' => $this->getFamillySituationsList(),
			'timezones' => $this->r_users->getTimezones(),
		]);
	}

	/**
	 * @param RequestAbstract $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function accountantUpdateWithRedirection(RequestAbstract $request, $id)
	{
		$this->updateUserProfileWithRequest($request, $id);

		return redirect(route('accountant.users.profile.index'));
	}

	/**
	 * @param RequestAbstract $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajaxChangeSidebarPinStatusJson(RequestAbstract $request)
	{
		if (!\Auth::check()) {
			return abort(403);
		}

		try {
			$this
				->update(
					[
						'is_sidebar_pined' => $request->get('is_sidebar_pined')
					],
					\Auth::user()->id
				);
		} catch (\Prettus\Validator\Exceptions\ValidatorException $exception) {
			\Sentry::captureException($exception);
		}

		return abort(204);
	}

	/**
	 * @return Profile
	 */
	protected function getCurrentUserProfile()
	{
		return $this
			->setPresenter(new ProfilesListPresenter())
			->find(\Auth::user()->profile->id);
	}

	/**
	 * @param RequestAbstract $request
	 * @param $id
	 */
	protected function updateUserProfileWithRequest(RequestAbstract $request, $id)
	{
		try {
			$profile = $this
				->update(
					[
						'birth_date' => $request->has('birth_date')
							? Carbon::createFromFormat(
								trans('global.date_format'),
								$request->get('birth_date')
							)->format('Y-m-d')
							: null,
						'family_situation' => $request->get('family_situation'),
						'maiden_name' => $request->get('maiden_name'),
					],
					$id
				);
			$this
				->r_users
				->update(
					[
						'time_zone' => $request->get('timezone')
					],
					$profile->user->id
				);
		} catch (\Prettus\Validator\Exceptions\ValidatorException $exception) {
			\Sentry::captureException($exception);
		}
	}
}
