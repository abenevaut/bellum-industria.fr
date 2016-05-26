<?php namespace Modules\Users\Http\Outputters;

use Illuminate\Support\Facades\Request;
use CVEPDB\Settings\Facades\Settings;
use Core\Http\Outputters\FrontOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Modules\Users\Repositories\UserRepositoryEloquent;
use Modules\Users\Repositories\ApiKeyRepositoryEloquent;
use Modules\Users\Repositories\RoleRepositoryEloquent;
use Modules\Users\Events\Admin\UserDeletedEvent;

/**
 * Class UserOutputter
 * @package Modules\Users\Outputters
 */
class UserOutputter extends FrontOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'users::front.meta_title';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'users::front.meta_description';

	/**
	 * @var null UserRepositoryEloquent
	 */
	private $r_user = null;

	/**
	 * @var RoleRepositoryEloquent|null
	 */
	private $r_role = null;

	/**
	 * @var ApiKeyRepositoryEloquent|null
	 */
	private $r_apikey = null;

	/**
	 * UserOutputter constructor.
	 *
	 * @param SettingsRepository       $_settings
	 * @param UserRepositoryEloquent   $r_user
	 * @param RoleRepositoryEloquent   $r_role
	 * @param ApiKeyRepositoryEloquent $r_apikey
	 */
	public function __construct(
		SettingsRepository $_settings,
		UserRepositoryEloquent $r_user,
		RoleRepositoryEloquent $r_role,
		ApiKeyRepositoryEloquent $r_apikey
	)
	{

		parent::__construct($_settings);

		$this->set_current_module('users');

		$this->r_user = $r_user;
		$this->r_role = $r_role;
		$this->r_apikey = $r_apikey;

		$this->addBreadcrumb('Users', 'admin/users');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->redirectTo('users/my-profile');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return null;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(IFormRequest $request)
	{
		return null;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->r_user->find($id);

		$social_login = Settings::get('users.social.login');

		return $this->output(
			'users.users.show',
			[
				'user' => $user
			]
		);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->r_user->find($id);

		return $this->output(
			'users.users.edit',
			[
				'user' => $user
			]
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update($id, IFormRequest $request)
	{

		dd($request->all());

		$this->r_user->update([
			'first_name' => $request->get('first_name'),
			'last_name'  => $request->get('last_name'),
			'email'      => $request->get('email')
		], $id);

		return $this->redirectTo('users/my-profile')
			->with('message-success', 'users::admin.edit.message.success');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		return null;

//        $this->r_user->findAndDelete($id);
//
//        event(new UserDeletedEvent($id));
//
//        return $this->redirectTo('admin/users')
//            ->with('message-success', 'users::admin.delete.message.success');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit_password($id)
	{
		$user = $this->r_user->find($id);

		return $this->output(
			'users.users.edit_password',
			[
				'user' => $user
			]
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update_password($id, IFormRequest $request)
	{
		$old_password = $request->get('old_password');
		$new_password = $request->get('password');

		if (!$this->r_user->change_password($id, $old_password, $new_password))
		{
			return $this->redirectTo('users/edit-my-password')
				->with('message-error', 'users::admin.edit.message.error_old_password');
		}

		return $this->redirectTo('users/my-profile')
			->with('message-success', 'users::admin.edit.message.success');
	}
}
