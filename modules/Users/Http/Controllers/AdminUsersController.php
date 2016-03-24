<?php namespace Modules\Users\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Users\Outputters\UserAdminOutputter;
use Modules\Users\Http\Requests\UserAdminFormRequest;
use Modules\Users\Http\Requests\UsersIndexFiltersAdminFormRequest;
use Modules\Users\Http\Requests\UsersMultiDestroyAdminFormRequest;
use Modules\Users\Exports\UsersListAdminExport;

class AdminUsersController extends Controller {

	/**
	 * @var UserAdminOutputter|null
	 */
	protected $outputter = null;

	/**
	 * @param UserAdminOutputter $outputter
	 */
	public function __construct(UserAdminOutputter $outputter)
	{
		$this->outputter = $outputter;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(UsersIndexFiltersAdminFormRequest $request)
	{
		return $this->outputter->index($request);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->outputter->create();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(UserAdminFormRequest $request)
	{
		return $this->outputter->store($request);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->outputter->show($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $this->outputter->edit($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UserAdminFormRequest $request)
	{
		return $this->outputter->update($id, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->outputter->destroy($id);
	}

	/**
	 * Remove multiple users
	 *
	 * @param UsersMultiDestroyAdminFormRequest $request
	 * @return mixed
	 */
	public function destroy_multiple(UsersMultiDestroyAdminFormRequest $request)
	{
		return $this->outputter->destroy_multiple($request);
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function impersonate($id) {
		return $this->outputter->impersonate($id);
	}

	/**
	 * @return mixed
	 */
	public function endimpersonate() {
		return $this->outputter->endimpersonate();
	}

	/**
	 * @return mixed
	 */
	public function export(UsersListAdminExport $excel) {
		return $this->outputter->export($excel);
	}
}