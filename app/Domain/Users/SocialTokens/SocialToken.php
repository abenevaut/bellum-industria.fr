<?php namespace cms\Domain\Users\SocialTokens;

use cms\Infrastructure\Abstractions\ModelAbstract;

class SocialToken extends ModelAbstract
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
	public function user() {
		return $this->hasOne('cms\Domain\Users\Users\User');
	}
}
