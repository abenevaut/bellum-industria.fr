<?php namespace Modules\Users\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Users\Outputters\RoleAdminOutputter;
use Modules\Users\Requests\RoleAdminFormRequest;

class AdminRolesController extends Controller {

	/**
	 * @var RoleAdminOutputter|null
	 */
	protected $outputter = null;

	/**
	 * @param RoleAdminOutputter $outputter
	 */
	public function __construct(RoleAdminOutputter $outputter)
	{
		$this->outputter = $outputter;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->outputter->index();
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
	public function store(RoleAdminFormRequest $request)
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
	public function update($id, RoleAdminFormRequest $request)
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
}