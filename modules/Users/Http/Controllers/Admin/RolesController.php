<?php namespace Modules\Users\Http\Controllers\Admin;

use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Users\Http\Outputters\Admin\RoleOutputter;
use Modules\Users\Http\Requests\Admin\RoleFormRequest;

/**
 * Class AdminRolesController
 * @package Modules\Users\Http\Controllers
 */
class RolesController extends Controller {

	/**
	 * @var RoleOutputter|null
	 */
	protected $outputter = null;

	/**
	 * @param RoleOutputter $outputter
	 */
	public function __construct(RoleOutputter $outputter)
	{
		parent::__construct();
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
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return $this->outputter->create();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param RoleFormRequest $request
	 * @return \Modules\Users\Outputters\Response
	 */
	public function store(RoleFormRequest $request)
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
	 * @param RoleFormRequest $request
	 * @return mixed|\Redirect
	 */
	public function update($id, RoleFormRequest $request)
	{
		return $this->outputter->update($id, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return \Modules\Users\Outputters\Response
	 */
	public function destroy($id)
	{
		return $this->outputter->destroy($id);
	}
}