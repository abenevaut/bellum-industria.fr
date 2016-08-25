<?php namespace cms\Domain\Environments\Environments\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Container as Application;
use CVEPDB\Settings\Facades\Settings;
use cms\Modules\Installer\Infrastructure\Abstractions\Requests\FormRequestAbstract;
use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
//use Core\Criterias\OnlyTrashedCriteria;
//use Core\Criterias\WithTrashedCriteria;
use cms\Domain\Environments\Environments\Environment;
use cms\Domain\Environments\Environments\Events\EnvironmentCreatedEvent;
use cms\Domain\Environments\Environments\Events\EnvironmentDeletedEvent;
use cms\Domain\Environments\Environments\Events\EnvironmentUpdatedEvent;
use cms\Domain\Users\Roles\Repositories\RolesRepositoryEloquent;
use cms\Domain\Environments\Environments\Presenters\EnvironmentListPresenter;

/**
 * Class EnvironmentsRepositoryEloquent
 * @package cms\Domain\Environments\Environments\Repositories
 */
class EnvironmentsRepositoryEloquent extends RepositoryEloquentAbstract implements EnvironmentsRepository
{

	const DEFAULT_ENVIRONMENT_REFERENCE = 'default';

	protected $r_roles = null;

	/**
	 * UserRepositoryEloquent constructor.
	 *
	 * @param Application            $app
	 * @param RolesRepositoryEloquent $r_roles
	 */
	public function __construct(
		Application $app,
		RolesRepositoryEloquent $r_roles
	)
	{
		parent::__construct($app);

		$this->r_roles = $r_roles;
	}

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Environment::class;
	}

	/**
	 * Display all users with trashed users.
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterShowWithTrashed()
	{
//		$this->pushCriteria(new WithTrashedCriteria());
	}

	/**
	 * Display only trashed user.
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterShowOnlyTrashed()
	{
//		$this->pushCriteria(new OnlyTrashedCriteria());
	}

	/**
	 * Create user and fire event "UserCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event Core\Domain\Users\Events\UserUpdatedEvent
	 * @return \Core\Domain\Users\Entities\User
	 */
	public function create(array $attributes)
	{
		$environment = parent::create($attributes);

		event(new EnvironmentCreatedEvent($environment));

		return $environment;
	}

	/**
	 * Update user and fire event "UserUpdatedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $user_id
	 *
	 * @event Core\Domain\Users\Events\UserUpdatedEvent
	 * @return \Core\Domain\Users\Entities\User
	 */
	public function update(array $attributes, $user_id)
	{
		$environment = parent::update($attributes, $user_id);

		event(new EnvironmentUpdatedEvent($environment));

		return $environment;
	}

	/**
	 * Delete user and fire event "UserDeletedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $user_id
	 *
	 * @event Core\Domain\Users\Events\UserDeletedEvent
	 * @return int
	 */
	public function delete($id)
	{
		$env = $this->find($id);

		$environment = parent::delete($id);

		event(new EnvironmentDeletedEvent($env));

		return $environment;
	}

	/**
	 * Return complete domain from an URL.
	 *
	 * @param string $url
	 *
	 * @return string
	 */
	public function get_domain_from_url($url)
	{
		return parse_url($url, PHP_URL_HOST);
	}

	/**
	 * @param Environment $env
	 * @param array       $roles Roles IDs to link to env
	 */
	public function link_roles_with(Environment $env, $roles = [])
	{
		foreach ($roles as $role)
		{
			$env->roles()->attach($role);
		}
	}

	/**
	 * @param Environment $env
	 * @param array       $users Users IDs to link to env
	 */
	public function link_users_with(Environment $env, $users = [])
	{
		foreach ($users as $user)
		{
			$env->users()->attach($user);
		}
	}

	/**
	 * Allow to link default roles Admin and User to an environment.
	 *
	 * @param Environment $env
	 */
	public function link_default_roles_with(Environment $env)
	{
		$this->link_roles_with(
			$env,
			[
				$this->r_roles
					->findByField('name', RolesRepositoryEloquent::ADMIN)
					->first()
					->id,
				$this->r_roles
					->findByField('name', RolesRepositoryEloquent::USER)
					->first()
					->id,
			]
		);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function indexBackEnd()
	{
		$this->setPresenter(new EnvironmentListPresenter());

		$this->filterShowWithTrashed();

		$envs = $this
			->paginate(Settings::get('app.pagination'));

		return cmsview(
			'core.admin.environments.index',
			[
				'environments' => $envs
			]
		);
	}

	/**
	 * @param FormRequestAbstract $request
	 *
	 * @return mixed|\Redirect
	 */
	public function storeBackEnd(FormRequestAbstract $request)
	{
		$environment = $this->create([
			'name'      => $request->get('name'),
			'reference' => $request->get('reference'),
			'domain'    => $request->get('domain'),
		]);

		$this->link_default_roles_with($environment);

		$this->link_users_with(
			$environment,
			[
				Auth::user()->id
			]
		);

		return redirect('backend/environments')
			->with('message-success', 'environments.index.modal.add.message.success');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function editBackEnd($id)
	{
		$env = $this->find($id);

		return cmsview(
			'core.admin.environments.show',
			[
				'environment' => $env
			]
		);
	}

	/**
	 * @param FormRequestAbstract $request
	 * @param                $id
	 *
	 * @return mixed|\Redirect
	 */
	public function updateBackEnd(FormRequestAbstract $request, $id)
	{
		$this->update(
			[
				'name'   => $request->get('name'),
				'domain' => $request->get('domain'),
			],
			$id
		);

		return redirect('backend/environments')
			->with('message-success', 'environments.index.modal.update.message.success');
	}

	/**
	 * @param $id
	 *
	 * @return mixed|\Redirect
	 */
	public function destroyBackEnd($id)
	{
		$redirectTo = null;

		try
		{
			$this->delete($id);

			$redirectTo = redirect('backend/environments')
				->with('message-success', 'environments.index.modal.delete.message.success');
		}
		catch (\Exception $e)
		{
			switch ($e->getCode())
			{
				case 1:
				{
					$redirectTo = redirect('backend/environments')
						->with('message-error', $e->getMessage());
					break;
				}
				default:
				{
					$redirectTo = redirect('backend/environments')
						->with('message-error', 'An error occured');
					break;
				}
			}
		}

		return $redirectTo;
	}

}
