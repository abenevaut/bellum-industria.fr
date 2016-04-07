<?php namespace Modules\Users\Http\Controllers\Admin;

use Request;
use Pingpong\Modules\Routing\Controller;
use Modules\Users\Outputters\UserAdminOutputter;
use Modules\Users\Http\Requests\Admin\UserFormRequest;
use Modules\Users\Http\Requests\Admin\UsersIndexFiltersFormRequest;
use Modules\Users\Http\Requests\Admin\UsersMultiDestroyFormRequest;
use Modules\Users\Exports\UsersListAdminExport;

/**
 * Class AdminUsersController
 * @package Modules\Users\Http\Controllers
 */
class UsersController extends Controller {

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
	 * @param UsersIndexFiltersFormRequest $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(UsersIndexFiltersFormRequest $request)
	{
		if (Request::ajax())
		{
			return $this->outputter->ajax_index($request);
		}
		return $this->outputter->index($request);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return $this->outputter->create();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param UserFormRequest $request
	 * @return \Modules\Users\Outputters\Response
	 */
	public function store(UserFormRequest $request)
	{
		return $this->outputter->store($request);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $id
	 * @return \Modules\Users\Outputters\Response
	 */
	public function show($id)
	{
		return $this->outputter->show($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $id
	 * @return \Modules\Users\Outputters\Response
	 */
	public function edit($id)
	{
		return $this->outputter->edit($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param $id
	 * @param UserFormRequest $request
	 * @return \Modules\Users\Outputters\Response
	 */
	public function update($id, UserFormRequest $request)
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
	 * @param UsersMultiDestroyFormRequest $request
	 * @return mixed
	 */
	public function destroy_multiple(UsersMultiDestroyFormRequest $request)
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