<?php namespace bellumindustria\Domain\Users\Profiles\Traits;

use bellumindustria\Domain\Users\Profiles\Repositories\ProfilesRepositoryEloquent;
use bellumindustria\Domain\Users\
{
	Profiles\Profile
};

trait ProfileableTrait
{

	/**
	 *
	 */
	public static function bootProfileableTrait()
	{
		static::deleted(function ($entity) {
			$entity
				->profile()
				->get()
				->each(function (Profile $profile) {
					$profile->delete();
				});
		});
	}

	/**
	 * Get the profile record associated with the user.
	 *
	 * @return mixed
	 */
	public function profile()
	{
		return $this->hasOne(Profile::class);
	}

	/**
	 * @param array $parameters
	 * @param array $emails
	 * @param array $phones
	 *
	 * @return mixed
	 */
	public function addProfile($parameters = [], $emails = [], $phones = [])
	{
		return app(ProfilesRepositoryEloquent::class)
			->createUserProfile($this, $parameters, $emails, $phones);
	}

	/**
	 * @param array $parameters
	 * @param array $emails
	 * @param array $phones
	 *
	 * @return mixed
	 */
	public function updateProfile($parameters = [], $emails = [], $phones = [])
	{
		return app(ProfilesRepositoryEloquent::class)
			->updateUserProfile($this, $parameters, $emails, $phones);
	}

	/**
	 * @return mixed
	 */
	public function deleteProfile()
	{
		return app(ProfilesRepositoryEloquent::class)
			->deleteUserProfile($this);
	}

	/**
	 * @return mixed
	 */
	public function getProfileEmails()
	{
		return app(ProfilesRepositoryEloquent::class)
			->getProfileEmails($this);
	}

	/**
	 * @return mixed
	 */
	public function getProfilePhones()
	{
		return app(ProfilesRepositoryEloquent::class)
			->getProfilePhones($this);
	}
}
