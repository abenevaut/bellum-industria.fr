<?php namespace cms\Domain\Users\SocialTokens;

use cms\Infrastructure\Abstractions\ModelAbstract;
use Core\Domain\Logs\Traits\LogTrait;

/**
 * Class SocialToken
 * @package cms\Domain\Users\SocialTokens
 */
class SocialToken extends ModelAbstract
{

	use LogTrait;

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
