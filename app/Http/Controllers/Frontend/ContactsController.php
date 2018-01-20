<?php namespace bellumindustria\Http\Controllers\Frontend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Http\Request\Frontend\Contacts\ContactRequest;
use bellumindustria\Domain\Users\Leads\Repositories\LeadsRepositoryEloquent;

class ContactsController extends ControllerAbstract
{

	/**
	 * @var LeadsRepositoryEloquent|null
	 */
	public $r_leads = null;

	/**
	 * ContactsController constructor.
	 *
	 * @param LeadsRepositoryEloquent $r_leads
	 */
	public function __construct(LeadsRepositoryEloquent $r_leads) {
		$this->r_leads = $r_leads;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		return $this->r_leads->frontendShowLeadIndexView();
	}

	/**
	 * @param ContactRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(ContactRequest $request) {
		return $this->r_leads->frontendReceiveLeadFormAndRedirect($request);
	}
}
