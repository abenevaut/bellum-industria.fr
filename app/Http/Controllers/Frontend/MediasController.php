<?php namespace bellumindustria\Http\Controllers\Frontend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Files\Medias\Repositories\MediasRepositoryEloquent;

class MediasController extends ControllerAbstract
{

	/**
	 * @var MediasRepositoryEloquent|null
	 */
	public $r_medias = null;

	/**
	 * MediasController constructor.
	 *
	 * @param MediasRepositoryEloquent $r_medias
	 */
	public function __construct(MediasRepositoryEloquent $r_medias) {
		$this->r_medias = $r_medias;

		$this->before();
	}

	/**
	 * @param $path
	 *
	 * @return mixed
	 */
	public function document($path) {
		return $this
			->r_medias
			->streamPublicDocument($path);
	}

	/**
	 *
	 */
	public function thumbnail($path) {
		// Direct output, don't need return statement.
		$this
			->r_medias
			->outputPublicThumbnails($path);
	}
}
