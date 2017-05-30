<?php

namespace bellumindustria\Domain\Users\Profiles\Traits;

use bellumindustria\Domain\Users\Profiles\Repositories\ProfilesRepositoryEloquent;
use bellumindustria\Domain\Users\Profiles\Profile;

trait ProfileableTrait
{

	/**
	 *
	 */
	public static function bootProfileableTrait() {
		static::deleted(function($entity)
		{
			$entity
				->profile()
				->get()
				->each(function(Profile $profile)
				{
					$profile->delete();
				});
		});
	}

	/**
	 * Get the profile record associated with the user.
	 */
	public function profile() {
		return $this->hasOne(
			'bellumindustria\Domain\Users\Profiles\Profile'
		);
	}

	/**
	 * @param array $parameters
	 *
	 * @return mixed
	 */
	public function addProfile($parameters = [], $emails = [], $phones = []) {
		return app(ProfilesRepositoryEloquent::class)
			->createProfileFromTrait($this, $parameters, $emails, $phones);
	}

	/**
	 * @param array $parameters
	 *
	 * @return mixed
	 */
	public function updateProfile($parameters = [], $emails = [], $phones = []) {
		return app(ProfilesRepositoryEloquent::class)
			->updateProfileFromTrait($this, $parameters, $emails, $phones);
	}

	/**
	 * @return mixed
	 */
	public function deleteProfile() {
		return app(ProfilesRepositoryEloquent::class)
			->deleteProfileFromTrait($this);
	}
}
