<?php namespace bellumindustria\Http\Controllers\Backend\Users;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Http\Request\Backend\Users\Users\
{
	UserFormRequest,
	UsersFiltersFormRequest
};
use bellumindustria\Domain\Users\Users\Repositories\UsersRepositoryEloquent;

class UsersController extends ControllerAbstract
{

	/**
	 * @var null
	 */
	protected $r_users = null;

	/**
	 * UsersController constructor.
	 * 
	 * @param UsersRepositoryEloquent $r_users
	 */
	public function __construct(UsersRepositoryEloquent $r_users)
	{
		$this->r_users = $r_users;

		$this->before();
	}

	/**
	 * Display list of resources.
	 *
	 * @param UsersFiltersFormRequest $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(UsersFiltersFormRequest $request)
	{
		return $this->r_users->backendIndexView($request);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param integer $id User id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		return $this->r_users->backendShowView($id);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
	 */
	public function create()
	{
		return $this->r_users->backendCreateView();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param UserFormRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(UserFormRequest $request)
	{
		return $this->r_users->backendStoreWithRedirection($request);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param integer $id User id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		return $this->r_users->backendEditView($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param integer         $id User id
	 * @param UserFormRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update($id, UserFormRequest $request)
	{
		return $this->r_users->backendUpdateWithRedirection($request, $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param integer $id User id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function destroy($id)
	{
		return $this->r_users->backendDestroyWithRedirection($id);
	}

	/**
	 * Export resources from storage.
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function export()
	{
		return $this->r_users->backendUsersExportWithCsvOutput();
	}
}
