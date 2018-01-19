<?php namespace bellumindustria\Http\Controllers\Backend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Organizations\Organizations\Repositories\OrganizationsRepositoryEloquent;

class OrganizationsController extends ControllerAbstract
{

	/**
	 * @var OrganizationsRepositoryEloquent|null
	 */
	protected $r_organizations = null;

	/**
	 * OrganizationsController constructor.
	 *
	 * @param OrganizationsRepositoryEloquent $r_organizations
	 */
	public function __construct(OrganizationsRepositoryEloquent $r_organizations)
	{
		$this->r_organizations = $r_organizations;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_organizations->backendIndexView();
	}
}
