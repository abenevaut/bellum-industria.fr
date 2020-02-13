<?php namespace bellumindustria\Http\Controllers\Frontend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Pages\Documentations\Repositories\DocumentationsRepositoryEloquent;

class DocumentationsController extends ControllerAbstract
{

	/**
	 * @var DocumentationsRepositoryEloquent|null
	 */
	public $r_documentations = null;

	/**
	 * DocumentationsController constructor.
	 *
	 * @param DocumentationsRepositoryEloquent $r_documentations
	 */
	public function __construct(DocumentationsRepositoryEloquent $r_documentations) {
		$this->r_documentations = $r_documentations;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		return $this
			->r_documentations
			->frontendShowDocumentationIndexView();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($slug) {
		return $this
			->r_documentations
			->frontendShowDocumentationPage($slug);
	}
}
