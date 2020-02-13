<?php namespace bellumindustria\Http\Controllers\Backend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Organizations\Bills\Repositories\BillsRepositoryEloquent;

class BillsController extends ControllerAbstract
{

	/**
	 * @var BillsRepositoryEloquent|null
	 */
	protected $r_bills = null;

	/**
	 * OrganizationsController constructor.
	 *
	 * @param BillsRepositoryEloquent $r_bills
	 */
	public function __construct(BillsRepositoryEloquent $r_bills)
	{
		$this->r_bills = $r_bills;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_bills->backendIndexView();
	}
}
