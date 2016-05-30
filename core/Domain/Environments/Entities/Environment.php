<?php namespace Core\Domain\Environments\Entities;

use Illuminate\Database\Eloquent\Model;
use Core\Domain\Logs\Traits\LogTrait;

/**
 * Class Environment
 * @package Core\Domain\Environments\Entities
 */
class Environment extends Model
{

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

}
