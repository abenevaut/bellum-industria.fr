<?php namespace Modules\Users\Http\Controllers\Admin;

use Request;
use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Users\Http\Outputters\Admin\UserOutputter;
use Modules\Users\Http\Requests\Admin\UserFormRequest;
use Modules\Users\Http\Requests\UsersFilteredFormRequest;
use Modules\Users\Http\Requests\Admin\UserMultiDestroyFormRequest;
use Modules\Users\Exports\UserListExport;

/**
 * Class UserController
 * @package Modules\Users\Http\Controllers\Admin
 */
class UserController extends Controller
{

	/**
	 * @var UserOutputter|null
	 */
	protected $outputter = null;

	/**
	 * @param UserOutputter $outputter
	 */
	public function __construct(UserOutputter $outputter)
	{
		parent::__construct();
		$this->outputter = $outputter;
	}

	/**
	 * @param UsersFilteredFormRequest $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(UsersFilteredFormRequest $request)
	{
		return $this->outputter->index($request, Request::ajax());
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
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->outputter->destroy($id);
	}

	/**
	 * Remove multiple users
	 *
	 * @param UserMultiDestroyFormRequest $request
	 * @return mixed
	 */
	public function destroy_multiple(UserMultiDestroyFormRequest $request)
	{
		return $this->outputter->destroy_multiple($request);
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function impersonate($id)
	{
		return $this->outputter->impersonate($id);
	}

	/**
	 * @return mixed
	 */
	public function endimpersonate()
	{
		return $this->outputter->endimpersonate();
	}

	/**
	 * @return mixed
	 */
	public function export(UserListExport $excel)
	{
		return $this->outputter->export($excel);
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function resetpassword($id)
	{
		return $this->outputter->resetpassword($id);
	}
}
