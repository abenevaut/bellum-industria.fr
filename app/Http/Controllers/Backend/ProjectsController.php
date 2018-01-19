<?php namespace bellumindustria\Http\Controllers\Backend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Projects\Projects\Repositories\ProjectsRepositoryEloquent;

class ProjectsController extends ControllerAbstract
{

	/**
	 * @var ProjectsRepositoryEloquent|null
	 */
	protected $r_projects = null;

	/**
	 * FilesController constructor.
	 *
	 * @param ProjectsRepositoryEloquent $r_projects
	 */
	public function __construct(ProjectsRepositoryEloquent $r_projects)
	{
		$this->r_projects = $r_projects;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_projects->backendIndexView();
	}
}
