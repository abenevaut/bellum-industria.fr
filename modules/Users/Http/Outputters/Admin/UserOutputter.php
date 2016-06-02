<?php namespace Modules\Users\Http\Outputters\Admin;

use Core\Domain\Environments\Facades\EnvironmentFacade;
use Core\Domain\Users\Presenters\UserListPresenter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Maatwebsite\Excel\Files\NewExcelFile;
use CVEPDB\Addresses\AddressesFacade as Addresses;
use CVEPDB\Settings\Facades\Settings;
use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Core\Domain\Roles\Repositories\PermissionRepositoryEloquent;
use Modules\Users\Repositories\UserRepositoryEloquent;
use Modules\Users\Repositories\RoleRepositoryEloquent;
use Modules\Users\Presenters\UserListExcelPresenter;

/**
 * Class UserOutputter
 * @package Modules\Users\Http\Outputters\Admin
 */
class UserOutputter extends AdminOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'users::admin.meta_title';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'users::admin.meta_description';

	/**
	 * @var null UserRepositoryEloquent
	 */
	private $r_user = null;

	/**
	 * @var RoleRepositoryEloquent|null
	 */
	private $r_role = null;

	public function __construct(
		SettingsRepository $_settings,
		UserRepositoryEloquent $r_user,
		RoleRepositoryEloquent $r_role
	)
	{
		parent::__construct($_settings);

		$this->set_current_module('users');

		$this->r_user = $r_user;
		$this->r_role = $r_role;

		$this->addBreadcrumb('Users', 'admin/users');
	}

	/**
	 * @param IFormRequest $request
	 * @param bool|false   $usePartial
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(IFormRequest $request, $usePartial = false)
	{
		$name = $request->has('name')
			? $request->get('name')
			: null;

		$email = $request->has('email')
			? $request->get('email')
			: null;

		$roles = $request->has('roles')
			? $request->get('roles')
			: null;

		$trashed = $request->has('trashed')
			? $request->get('trashed')
			: null;

		$environments = $request->has('environments')
			? $request->get('environments')
			: [];

		$this->r_user->setPresenter(new UserListPresenter());

		if (!$this->user_can_see_environment)
		{
			$environments = [EnvironmentFacade::currentId()];
		}

		$this->r_user->filterEnvironments($environments);

		if (!is_null($name))
		{
			$this->r_user->filterUserName($name);
		}

		if (!is_null($email))
		{
			$this->r_user->filterEmail($email);
		}

		if (!is_null($roles))
		{
			$this->r_user->filterRoles($roles);
		}

		if (!is_null($trashed))
		{
			switch ($trashed)
			{
				case 'with_trashed':
					$this->r_user->filterShowWithTrashed();
					break;
				case 'only_trashed':
					$this->r_user->filterShowOnlyTrashed();
					break;
				default:
					// Display active users only
			}
		}

		$users = $this->r_user
			->with(['environments', 'roles'])
			->paginate(Settings::get('app.pagination'), $this->r_user->fields);

		return $this->output(
			$usePartial
				? 'users.admin.users.chunks.index_tables'
				: 'users.admin.users.index',
			[
				'users'    => $users,
				'nb_users' => $this->r_user->count(),
				'user_can_see_env' => $this->user_can_see_environment,
				'filters'  => [
					'name'         => $name,
					'email'        => $email,
					'roles'        => $roles,
					'environments' => $environments,
				]
			]
		);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		/*
		 * Exclude user role because always added to every new user
		 */

		$roles = $this->r_role->listWithoutUser();

		return $this->output(
			'users.admin.users.create',
			[
				'roles' => $roles,
				'user_can_see_env' => $this->user_can_see_environment
			]
		);
	}

	/**
	 * Store new user.
	 *
	 * @param IFormRequest $request
	 *
	 * @return mixed
	 */
	public function store(IFormRequest $request)
	{
		$environments = $request->only('environments');
		$roles = $request->only('user_role_id');
		$addresses = $request->only('address');

		/*
		 * Create user with defaut user role for selected environment(s).
		 */

		$user = $this->r_user->create_user(
			$request->get('first_name'),
			$request->get('last_name'),
			$request->get('email')
		);

		$this->r_user
			->set_user_environments(
				$user,
				$environments['environments']
			);

		$this->r_user
			->set_user_roles(
				$user,
				$roles['user_role_id']
			);

		$validator = $this->r_user
			->set_user_addresses(
				$user,
				$addresses['addresses']
			);

		if ($validator->fails())
		{
			return $this->redirectTo('admin/users/' . $user->id . '/edit')
				->with('message-success', 'users::admin.create.message.success')
				->withErrors($validator)
				->withInput();
		}

		return $this->redirectTo('admin/users')
			->with('message-success', 'users::admin.create.message.success');
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


		return $this->output(
			'users.admin.users.show',
			[
				'user'             => $user,
				'user_can_see_env' => $this->user_can_see_environment
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

		/*
		 * Exclude user role because always added to every new user
		 */

		$roles = $this->r_role->listWithoutUser();

		return $this->output(
			'users.admin.users.edit',
			[
				'user'  => $user,
				'roles' => $roles,
				'user_can_see_env' => $this->user_can_see_environment
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
		$user = $this->r_user->update([
			'first_name' => $request->get('first_name'),
			'last_name'  => $request->get('last_name'),
			'email'      => $request->get('email')
		], $id);

		$roles = $request->only('user_role_id');

		$user->roles()->detach();
		// Always attach client role
		$role = $this->r_role->role_exists(RoleRepositoryEloquent::USER);
		$user->attachRole($role);

		if (count($roles['user_role_id']) > 0)
		{
			$user->roles()->attach($roles['user_role_id']);
		}

		$addresses = $request->only('address');
		$addresses = $addresses['address'];
		$primary_address = array_key_exists('primary', $addresses) ? $addresses['primary'] : [];

		/**
		 * Check addresses values
		 *
		 * If primary address registered and not others, use primary foreach addresses
		 */
		foreach ($addresses as $type => $address)
		{
			$validator = Addresses::getValidator($address);

			if (!$validator->fails())
			{
				$db_address = $user->{$type . 'Address'}();

				if (is_null($db_address))
				{
					Addresses::createAddress($address, $user->id);
				}
				else
				{
					Addresses::updateAddress($db_address, $address, $user->id);
				}
			}
			else
			{
				return redirect('admin/users/' . $id . '/edit')
					->withErrors($validator)
					->withInput();
			}
		}

		return $this->redirectTo('admin/users')
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
		$redirectTo = null;

		try
		{
			$this->r_user->findAndDelete($id);

			$redirectTo = $this->redirectTo('admin/users')
				->with('message-success', 'users::admin.delete.message.success');
		}
		catch (\Exception $e)
		{
			switch ($e->getCode())
			{
				case 1:
				{
					$redirectTo = $this->redirectTo('admin/users')
						->with('message-error', $e->getMessage());
					break;
				}
			}
		}

		return $redirectTo;
	}

	/**
	 * @param IFormRequest $request
	 *
	 * @return \Redirect
	 */
	public function destroy_multiple(IFormRequest $request)
	{
		$errors = 0;
		$redirectTo = $this->redirectTo('admin/users');
		$users = $request->only('users_multi_destroy');

		foreach ($users['users_multi_destroy'] as $user_id)
		{
			try
			{
				$this->r_user->findAndDelete($user_id);
			}
			catch (\Exception $e)
			{
				switch ($e->getCode())
				{
					case 1:
					{
						$redirectTo = $redirectTo->with('message-error', $e->getMessage());
						break;
					}
				}
				++$errors;
			}
		}

		return 0 === $errors
			? $redirectTo->with('message-success', 'users::admin.delete_multiple.message.success')
			: $redirectTo;
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function impersonate($id)
	{
		Session::set('impersonate_member', $id);

		return $this->redirectTo('/');
	}

	/**
	 * @return mixed
	 */
	public function endimpersonate()
	{
		Session::forget('impersonate_member');

		return $this->redirectTo('admin');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function resetpassword($id)
	{
		$response = $this->r_user->send_reset_password_link($id);

		switch ($response)
		{
			case Password::RESET_LINK_SENT:
			{
				Session::flash('message-success', trans('passwords.message_success_reset_password'));
				break;
			}
			case Password::INVALID_USER:
			default:
			{
				Session::flash('message-success', trans('passwords.message_error_reset_password'));
			}
		}

		return $this->redirectTo('admin/users');
	}

	/**
	 * @param NewExcelFile $excel
	 *
	 * @return mixed
	 */
	public function export(NewExcelFile $excel)
	{
		$this->r_user->setPresenter(new UserListExcelPresenter());

		if (
			!Auth::user()->hasRole(RoleRepositoryEloquent::ADMIN)
			&& !Auth::user()->hasPermission(PermissionRepositoryEloquent::SEE_ENVIRONMENT)
		)
		{
			// Force filter on current environment
			$this->r_user->filterEnvironments([EnvironmentFacade::currentId()]);
		}

		$users = $this->r_user->with(['roles', 'addresses'])->all();
		$nb_users = $this->r_user->count();

		return $excel->setTitle(trans('users::admin.export.users_list.title'))
			->setCreator(Auth::user()->full_name)
			->setDescription(
				Settings::get('core.site.name') . PHP_EOL . Settings::get('core.site.description')
			)
			->sheet(
				trans('users::admin.export.users_list.sheet_title') . date('Y-m-d H\hi'),
				function ($sheet) use ($users, $nb_users)
				{

					/*
					 * Header
					 */

					$header = [
						'#',
						trans('global.last_name'),
						trans('global.first_name'),
						trans('global.email'),
						trans('global.role_s'),
					];

					if (
						Auth::user()->hasRole(RoleRepositoryEloquent::ADMIN)
						|| Auth::user()->hasPermission(PermissionRepositoryEloquent::SEE_ENVIRONMENT)
					)
					{
						$header[] = trans('global.environment_s');
					}

					$header[] = trans('global.addresse_s');

					$sheet->prependRow($header);

					/*
					 * Data
					 */

					// Append row after row 2
					$sheet->rows($users['data']);

					// Append row after row 2
					$sheet->appendRow(
						$nb_users + 2,
						[
							sprintf(
								trans('users::admin.export.total_users'),
								$nb_users
							)
						]
					);

					/*
					 * Style
					 */

					// Set black background
					$sheet->row(1, function ($row)
					{
						// Set font
						$row
							->setFont(array(
								'size' => '14',
								'bold' => true,
							))
							->setAlignment('center')
							->setValignment('middle');
					});

					// Freeze first row
					$sheet->freezeFirstRow();

					$sheet->cells('A2:F' . ($nb_users + 2), function ($cells)
					{
						// Set font
						$cells
							->setFont([
								'size'      => '12',
								'bold'      => false,
								'wrap-text' => true, // Allow PHP_EOL
							])
							->setAlignment('center')
							->setValignment('middle');
					});

					$sheet->row($nb_users + 2, function ($row)
					{
						// Set font
						$row
							->setFont([
								'size' => '12',
								'bold' => true,
							])
							->setAlignment('center')
							->setValignment('middle');
					});
				}
			)->export('xls');
	}
}
