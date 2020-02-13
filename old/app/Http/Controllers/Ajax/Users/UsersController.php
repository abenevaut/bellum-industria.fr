<?php namespace bellumindustria\Http\Controllers\Ajax\Users;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Http\Request\Ajax\Users\
{
	Users\UsersAjaxList,
	Users\CheckUserEmailFormRequest
};
use bellumindustria\Domain\Users\Users\Repositories\UsersRepositoryEloquent;

class UsersController extends ControllerAbstract
{

	/**
	 * @var UsersRepositoryEloquent|null
	 */
	protected $r_users = null;

	/**
	 * @param UsersRepositoryEloquent $r_users
	 */
	public function __construct(UsersRepositoryEloquent $r_users)
	{
		$this->r_users = $r_users;

		$this->before();
	}

	/**
	 * Get an users list.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index(UsersAjaxList $request)
	{
		return $this->r_users->ajaxIndexJson($request);
	}

	/**
	 * Get an users list filtered by FormRequest.
	 *
	 * @param CheckUserEmailFormRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajaxCheckUserEmail(CheckUserEmailFormRequest $request)
	{
		return $this->r_users->ajaxCheckUserEmailJson($request);
	}
}
