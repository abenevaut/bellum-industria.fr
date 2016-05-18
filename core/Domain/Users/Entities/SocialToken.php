<?php namespace Core\Domain\Users\Entities;

use CVEPDB\Abstracts\Entities\Model;

/**
 * Class SocialToken
 * @package Core\Domain\Users\Entities
 */
class SocialToken extends Model
{

	/**
	 * @var string
	 */
	protected $table = 'social_tokens';

	/**
	 * @var array
	 */
	protected $fillable = [
		'provider',
		'token',
		'user_id'
	];

	/**
	 * The user that belong to the apikey.
	 */
	public function user()
	{
		return $this->hasOne('Core\Domain\Users\Entities\User');
	}
}
