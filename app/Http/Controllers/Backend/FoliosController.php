<?php namespace bellumindustria\Http\Controllers\Backend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Projects\Folios\Repositories\FoliosRepositoryEloquent;

class FoliosController extends ControllerAbstract
{

	/**
	 * @var FoliosRepositoryEloquent|null
	 */
	protected $r_folios = null;

	/**
	 * FilesController constructor.
	 *
	 * @param FoliosRepositoryEloquent $r_folios
	 */
	public function __construct(FoliosRepositoryEloquent $r_folios)
	{
		$this->r_folios = $r_folios;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_folios->backendIndexView();
	}
}
