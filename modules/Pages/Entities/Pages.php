<?php

namespace Modules\Pages\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Phoenix\EloquentMeta\MetaTrait;

class Pages extends Model implements Transformable
{
	use TransformableTrait;
	use MetaTrait;

	protected $fillable = [
		'title',
		'content',
		'is_home',
		'uri',
		'slug'
	];

}
