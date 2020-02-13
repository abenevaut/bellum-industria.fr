<?php namespace bellumindustria\Domain\Users\Profiles;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\
{
	HasMedia\HasMediaTrait,
	HasMedia\Interfaces\HasMedia
};
use bellumindustria\Infrastructure\
{
	Interfaces\Domain\Users\Profiles\ProfileFamiliesSituationsInterface,
	Contracts\Model\ModelAbstract,
	Contracts\Model\TimeStampsTz,
	Contracts\Model\SoftDeletesTz
};
use bellumindustria\Domain\Users\
{
	Users\User,
	ProfilesEmails\ProfileEmail,
	ProfilesPhones\ProfilePhone
};

class Profile extends ModelAbstract implements ProfileFamiliesSituationsInterface, HasMedia
{

	use HasMediaTrait;
	use SoftDeletes;
	use TimeStampsTz;
	use SoftDeletesTz;

	/**
	 * @var string
	 */
	protected $table = 'profiles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'birth_date',
		'family_situation',
		'maiden_name',
		'is_sidebar_pined',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];

	/**
	 * Date mutator to obtain a variable "birth_date_carbon".
	 *
	 * @return \Carbon\Carbon
	 */
	public function getBirthDateCarbonAttribute()
	{
		return is_null($this->birth_date) ?: new Carbon($this->birth_date);
	}

	/**
	 * Get the user record associated with the trainer profile.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the emails record associated with the trainer profile.
	 */
	public function emails()
	{
		return $this->hasMany(ProfileEmail::class);
	}

	/**
	 * Get the phones record associated with the trainer profile.
	 */
	public function phones()
	{
		return $this->hasMany(ProfilePhone::class);
	}
}
