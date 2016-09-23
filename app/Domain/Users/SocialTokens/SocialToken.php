<?php namespace cms\Domain\Users\SocialTokens;

use cms\Infrastructure\Abstractions\ModelAbstract;

/**
 * Class SocialToken
 *
 * @package cms\Domain\Users\SocialTokens
 * @property string $provider
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $token
 * @property int $user_id
 * @property-read \cms\Domain\Users\Users\User $user
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\SocialTokens\SocialToken whereProvider($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\SocialTokens\SocialToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\SocialTokens\SocialToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\SocialTokens\SocialToken whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Users\SocialTokens\SocialToken whereUserId($value)
 * @mixin \Eloquent
 */
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
	public function user()
	{
		return $this->hasOne('cms\Domain\Users\Users\User');
	}
}
