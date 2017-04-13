<?php namespace cms\Domain\Domains\Domains\Repositories;

use Illuminate\Support\Facades\Auth;
use cms\Infrastructure\Abstractions\Requests\FormRequestAbstract;
use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
use cms\Domain\Domains\Domains\Domain;
use cms\Domain\Domains\Domains\Events\DomainCreatedEvent;
use cms\Domain\Domains\Domains\Events\DomainDeletedEvent;
use cms\Domain\Domains\Domains\Events\DomainUpdatedEvent;
use cms\Domain\Domains\Domains\Presenters\DomainListPresenter;

class DomainsRepositoryEloquent extends RepositoryEloquentAbstract implements DomainsRepository
{

	const DEFAULT_DOMAIN_REFERENCE = 'default';

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model() {
		return Domain::class;
	}

	/**
	 * Display all users with trashed users.
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterShowWithTrashed() {
		//		return $this->pushCriteria(new WithTrashedCriteria());

		return $this;
	}

	/**
	 * Display only trashed user.
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterShowOnlyTrashed() {
		//		return $this->pushCriteria(new OnlyTrashedCriteria());

		return $this;
	}

	/**
	 * Create Domain and fire event "DomainCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event cms\Domain\Domains\Domains\Events\DomainCreatedEvent
	 * @return \cms\Domain\Domains\Domains\Domain
	 */
	public function create(array $attributes) {

		$domain = parent::create($attributes);

		event(new DomainCreatedEvent($domain));

		return $domain;
	}

	/**
	 * Update Domain and fire event "DomainUpdatedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $user_id
	 *
	 * @event cms\Domain\Domains\Domains\Events\DomainUpdatedEvent
	 * @return \cms\Domain\Domains\Domains\Domain
	 */
	public function update(array $attributes, $user_id) {
		$domain = parent::update($attributes, $user_id);

		event(new DomainUpdatedEvent($domain));

		return $domain;
	}

	/**
	 * Delete Domain and fire event "DomainDeletedEvent".
	 *
	 * @param integer $user_id
	 *
	 * @event cms\Domain\Domains\Domains\Events\DomainDeletedEvent
	 * @return int
	 */
	public function delete($user_id) {
		$env = $this->find($user_id);

		$domain = parent::delete($user_id);

		event(new DomainDeletedEvent($env));

		return $domain;
	}

	/**
	 * Return complete domain from an URL.
	 *
	 * @param string $url
	 *
	 * @return string
	 */
	public function get_domain_from_url($url) {
		return parse_url($url, PHP_URL_HOST);
	}

	/**
	 * @param Domain $env
	 * @param array  $roles Roles IDs to link to env
	 */
	public function link_roles_with(Domain $env, $roles = []) {
		foreach ($roles as $role)
		{
			$env->roles()->attach($role);
		}
	}

	/**
	 * @param Domain $env
	 * @param array  $users Users IDs to link to env
	 */
	public function link_users_with(Domain $env, $users = []) {
		foreach ($users as $user)
		{
			$env->users()->attach($user);
		}
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function indexBackEnd() {
		$this->setPresenter(new DomainListPresenter());

		$this->filterShowWithTrashed();

		$envs = $this
			->paginate(\Settings::get('app.pagination'));

		return cmsview(
			'app.backend.Domains.index',
			[
				'Domains' => $envs
			]
		);
	}

	/**
	 * @param FormRequestAbstract $request
	 *
	 * @return mixed|\Redirect
	 */
	public function storeBackEnd(FormRequestAbstract $request) {
		$domain = $this->create([
			'name'      => $request->get('name'),
			'reference' => $request->get('reference'),
			'domain'    => $request->get('domain'),
		]);

		$this->link_users_with(
			$domain,
			[
				Auth::user()->id
			]
		);

		return redirect(route('backend.Domains.index'))
			->with('message-success', 'Domains/backend.index.modal.add.message.success');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function editBackEnd($id) {
		$env = $this->find($id);

		return cmsview(
			'app.backend.Domains.show',
			[
				'Domain' => $env
			]
		);
	}

	/**
	 * @param FormRequestAbstract $request
	 * @param                     $id
	 *
	 * @return mixed|\Redirect
	 */
	public function updateBackEnd(FormRequestAbstract $request, $id) {
		$this->update(
			[
				'name'   => $request->get('name'),
				'domain' => $request->get('domain'),
			],
			$id
		);

		return redirect(route('backend.Domains.index'))
			->with('message-success', 'Domains/backend.index.modal.update.message.success');
	}

	/**
	 * @param $id
	 *
	 * @return mixed|\Redirect
	 */
	public function destroyBackEnd($id) {
		$redirectTo = null;

		try
		{
			$this->delete($id);

			$redirectTo = redirect(route('backend.Domains.index'))
				->with('message-success', 'Domains/backend.index.modal.delete.message.success');
		}
		catch (\Exception $e)
		{
			switch ($e->getCode())
			{
				case 1:
				{
					$redirectTo = redirect(route('backend.Domains.index'))
						->with('message-error', $e->getMessage());
					break;
				}
				default:
				{
					$redirectTo = redirect(route('backend.Domains.index'))
						->with('message-error', 'An error occured');
					break;
				}
			}
		}

		return $redirectTo;
	}
}
