<?php namespace Modules\Users\Http\Outputters\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Password;
use \Maatwebsite\Excel\Files\NewExcelFile;
use CVEPDB\Addresses\AddressesFacade as Addresses;
use CVEPDB\Settings\Facades\Settings;
use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Modules\Users\Repositories\UserRepositoryEloquent;
use Modules\Users\Repositories\ApiKeyRepositoryEloquent;
use Modules\Users\Presenters\UsersAdminExcelPresenter;
use Modules\Users\Repositories\RoleRepositoryEloquent;
use Modules\Users\Events\Admin\UserCreatedEvent;
use Modules\Users\Events\Admin\UserUpdatedEvent;
use Modules\Users\Events\Admin\UserDeletedEvent;

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

	/**
	 * @var ApiKeyRepositoryEloquent|null
	 */
	private $r_apikey = null;

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
			$this->r_user->filterTrashed($trashed);
		}

		$users = $this->r_user->paginate(config('app.pagination'));

		return $this->output(
			$usePartial
				? 'users.admin.users.chunks.index_tables'
				: 'users.admin.users.index',
			[
				'users'    => $users,
				'nb_users' => $this->r_user->count(),
				'filters'  => [
					'name'  => $name,
					'email' => $email,
					'roles' => $roles,
				]
			]
		);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		// Exclude user role because always added to every new user
		$roles = $this->r_role->findWhereNotIn('name', ['user']);

		return $this->output(
			'users.admin.users.create',
			[
				'roles' => $roles
			]
		);
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
		$user = $this->r_user->create_user(
			$request->get('first_name'),
			$request->get('last_name'),
			$request->get('email')
		);

		$this->r_apikey->generate_api_key($user);

		$roles = $request->only('user_role_id');

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
				Addresses::createAddress($address, $user->id);
			}
			else
			{
				return redirect('admin/users/' . $user->id . '/edit')
					->withErrors($validator)
					->withInput();
			}
		}

		event(new UserCreatedEvent($user));

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

		// On exclue le role user qui est ajoute par defaut
		$roles = $this->r_role->findWhereNotIn('name', ['user']);

		return $this->output(
			'users.admin.users.edit',
			[
				'user'  => $user,
				'roles' => $roles
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

		event(new UserUpdatedEvent($user));

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

			event(new UserDeletedEvent($id));

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
				event(new UserDeletedEvent($user_id));
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

		return redirect('/');
	}

	/**
	 * @return mixed
	 */
	public function endimpersonate()
	{
		Session::forget('impersonate_member');

		return redirect('admin');
	}

	public function export(NewExcelFile $excel)
	{
		$this->r_user->setPresenter(new UsersAdminExcelPresenter());
		$users = $this->r_user->with(['roles', 'addresses'])->all();
		$nb_users = $this->r_user->count();

		return $excel->setTitle(trans('users::admin.export.users_list.title'))
			->setCreator(Auth::user()->full_name)
			->setDescription(Settings::get('core.site.name') . PHP_EOL . Settings::get('core.site.description'))
			->sheet(
				trans('users::admin.export.users_list.sheet_title') . date('Y-m-d H\hi'),
				function ($sheet) use ($users, $nb_users)
				{

					$sheet->prependRow([
						'#',
						trans('global.last_name'),
						trans('global.first_name'),
						trans('global.email'),
						trans('global.role_s'),
						trans('global.addresse_s'),
					]);

					// Append row after row 2
					$sheet->rows($users['data']);

					// Append row after row 2
					$sheet->appendRow($nb_users + 2, [trans('users::admin.export.total_users') . ' : ' . $nb_users]);

					/*
					* Style
					*/

					// Set black background
					$sheet->row(1, function ($row)
					{
						// Set font
						$row->setFont(array(
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
						$cells->setFont([
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
						$row->setFont([
							'size' => '12',
							'bold' => true,
						])
							->setAlignment('center')
							->setValignment('middle');
					});

				}
			)->export('xls');
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

		return redirect('admin/users');
	}
}
