<?php namespace abenevaut\Http\Controllers\Backend;

use abenevaut\Infrastructure\Contracts\Controllers\ControllerAbstract;
use abenevaut\Domain\Users\Leads\Repositories\LeadsRepositoryEloquent;

class LeadsController extends ControllerAbstract
{

	/**
	 * @var null
	 */
	protected $r_leads = null;

	/**
	 * LeadsController constructor.
	 *
	 * @param LeadsRepositoryEloquent $r_leads
	 */
	public function __construct(LeadsRepositoryEloquent $r_leads)
	{
		$this->r_leads = $r_leads;

		$this->before();
	}

	/**
	 * Display list of resources.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_leads->backendIndexView();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param integer $id Lead id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		return $this->r_leads->backendEditWithRedirect($id);
	}
}
