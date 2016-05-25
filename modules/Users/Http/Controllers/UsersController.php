<?php namespace Modules\Users\Http\Controllers;

use Request;
use Core\Http\Controllers\CorePublicController as Controller;
use Modules\Users\Http\Outputters\UserOutputter;
use Modules\Users\Http\Requests\UserFormRequest;

/**
 * Class UsersController
 * @package Modules\Users\Http\Controllers
 */
class UsersController extends Controller {

	/**
	 * @var UserOutputter|null
	 */
	protected $outputter = null;

	/**
	 * @param UserOutputter $outputter
	 */
	public function __construct(UserOutputter $outputter)
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
	 * @return Response
	 */
	public function create()
	{
		abort(404);
	}

	/**
	 * @param UserFormRequest $request
	 * @return Response
	 */
	public function store(UserFormRequest $request)
	{
		abort(404);
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
		abort(404);
		//return $this->outputter->show($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		abort(404);
		//return $this->outputter->edit($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UserFormRequest $request)
	{
		abort(404);
		//return $this->outputter->update($id, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return null;
	}

	/**
	 * @return \Modules\Users\Http\Outputters\Response
	 */
	public function myProfile()
	{
		if (\Auth::check()) {
			return $this->outputter->show(\Auth::user()->id);
		}
		abort(404);
	}

	/**
	 * @return \Modules\Users\Http\Outputters\Response
	 */
	public function editMyProfile()
	{
		if (\Auth::check()) {
			return $this->outputter->edit(\Auth::user()->id);
		}
		abort(404);
	}

	/**
	 * @param UserFormRequest $request
	 * @return \Modules\Users\Http\Outputters\Response
	 */
	public function updateMyProfile(UserFormRequest $request)
	{
		if (\Auth::check()) {
			return $this->outputter->update(\Auth::user()->id, $request);
		}
		abort(404);
	}
}
