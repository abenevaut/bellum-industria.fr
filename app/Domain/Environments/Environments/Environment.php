<?php namespace cms\Domain\Environments\Environments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use cms\Domain\Logs\Logs\Traits\LogTrait;

/**
 * Class Environment
 *
 * @package cms\Domain\Environments\Environments
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @property string $reference
 * @property string $domain
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Users\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\cms\Domain\Users\Roles\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Environments\Environments\Environment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Environments\Environments\Environment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Environments\Environments\Environment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Environments\Environments\Environment whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Environments\Environments\Environment whereReference($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Environments\Environments\Environment whereDomain($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Environments\Environments\Environment whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Environment extends Model
{

	use SoftDeletes;
	use LogTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'environments';

	protected $fillable = [
		'id',
		'name',
		'reference',
		'domain'
	];

	/**
	 * Users that belong to the env.
	 */
	public function users()
	{
		return $this->belongsToMany('cms\Domain\Users\Users\User');
	}

	/**
	 * Roles that belong to the env.
	 */
	public function roles()
	{
		return $this->belongsToMany('cms\Domain\Users\Roles\Role');
	}

}
