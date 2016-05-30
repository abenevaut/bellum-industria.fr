<?php namespace Modules\Pages\Http\Controllers\Admin;

use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Pages\Http\Outputters\Admin\PageOutputter;
use Modules\Pages\Http\Requests\AdminPagesFormRequest;

/**
 * Class PagesController
 * @package Modules\Pages\Http\Controllers\Admin
 */
class PagesController extends Controller
{
	/**
	 * @var PageOutputter|null
	 */
	private $outputter = null;

	/**
	 * PagesController constructor.
	 *
	 * @param PageOutputter $outputter
	 */
	public function __construct(
	 PageOutputter $outputter
	) {
	
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
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return $this->outputter->create();
	}

	/**
	 * @param AdminPagesFormRequest $request
	 * @return \Modules\Pages\Http\Outputters\Admin\Response
	 */
	public function store(AdminPagesFormRequest $request)
	{
		return $this->outputter->store($request);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $id
	 *
	 * @return \Modules\Pages\Http\Outputters\Admin\Response
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
	public function update($id, AdminPagesFormRequest $request)
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
