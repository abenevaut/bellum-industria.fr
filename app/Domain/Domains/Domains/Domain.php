<?php namespace cms\Domain\Domains\Domains;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use cms\Domain\Logs\Logs\Traits\LogTrait;

class Domain extends Model
{

	use SoftDeletes;
	use LogTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'domains';

	protected $fillable = [
		'id',
		'name',
		'reference',
		'domain'
	];

	/**
	 * Users that belong to the env.
	 */
	public function users() {
		return $this->belongsToMany('cms\Domain\Users\Users\User');
	}
}
