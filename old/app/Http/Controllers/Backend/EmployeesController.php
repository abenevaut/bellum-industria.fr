<?php namespace bellumindustria\Http\Controllers\Backend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Organizations\Employees\Repositories\EmployeesRepositoryEloquent;

class EmployeesController extends ControllerAbstract
{

	/**
	 * @var EmployeesRepositoryEloquent|null
	 */
	protected $r_employees = null;

	/**
	 * OrganizationsController constructor.
	 *
	 * @param EmployeesRepositoryEloquent $r_employees
	 */
	public function __construct(EmployeesRepositoryEloquent $r_employees)
	{
		$this->r_employees = $r_employees;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_employees->backendIndexView();
	}
}
