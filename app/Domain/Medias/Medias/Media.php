<?php namespace cms\Domain\Medias\Medias;

use Spatie\MediaLibrary\Media as SpatieMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use cms\Domain\Logs\Logs\Traits\LogTrait;

/**
 * Class Media
 * @package cms\Domain\Medias\Medias
 */
class Media extends SpatieMedia
{

	use SoftDeletes;
	use LogTrait;

	protected $table = 'medias';

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	
}
