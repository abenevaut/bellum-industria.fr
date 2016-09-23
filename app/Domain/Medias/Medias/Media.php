<?php namespace cms\Domain\Medias\Medias;

use Spatie\MediaLibrary\Media as SpatieMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use cms\Domain\Logs\Logs\Traits\LogTrait;

/**
 * Class Media
 *
 * @package cms\Domain\Medias\Medias
 * @property int $id
 * @property int $model_id
 * @property string $model_type
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string $disk
 * @property int $size
 * @property array $manipulations
 * @property array $custom_properties
 * @property int $order_column
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @property-read string $type
 * @property-read string $type_from_extension
 * @property-read string $type_from_mime
 * @property-read string $extension
 * @property-read string $human_readable_size
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereModelId($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereModelType($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereCollectionName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereDisk($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereManipulations($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\cms\Domain\Medias\Medias\Media whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Spatie\MediaLibrary\Media ordered()
 * @mixin \Eloquent
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
