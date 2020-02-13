<?php

namespace bellumindustria\Domain\Organizations\Bills\Repositories;

use bellumindustria\Infrastructure\Contracts\
{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Organizations\Bills\
{
	Repositories\BillsRepositoryInterface,
	Organization,
	Events\OrganizationCreatedEvent,
	Events\OrganizationUpdatedEvent,
	Events\OrganizationDeletedEvent
};

class BillsRepositoryEloquent extends RepositoryEloquentAbstract implements BillsRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model(): string
	{
		return Bill::class;
	}

	/**
	 * Create organization request and fire event "OrganizationCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Organizations\Organizations\Events\OrganizationCreatedEvent
	 * @return \bellumindustria\Domain\Organizations\Bills\Organization
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function create(array $attributes): Organization
	{
		$organization = parent::create($attributes);

		event(new OrganizationCreatedEvent($organization));

		return $organization;
	}

	/**
	 * Update organization request and fire event "OrganizationUpdatedEvent".
	 *
	 * @param array $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Organizations\Organizations\Events\OrganizationUpdatedEvent
	 * @return \bellumindustria\Domain\Organizations\Bills\Organization
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function update(array $attributes, $id): Organization
	{
		$organization = parent::update($attributes, $id);

		event(new OrganizationUpdatedEvent($organization));

		return $organization;
	}

	/**
	 * Delete organization request and fire event "OrganizationDeletedEvent".
	 *
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Organizations\Organizations\Events\OrganizationDeletedEvent
	 * @return \bellumindustria\Domain\Organizations\Bills\Organization
	 */
	public function delete($id): Organization
	{
		$organization = $this->find($id);

		parent::delete($organization->id);

		event(new OrganizationDeletedEvent($organization));

		return $organization;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendIndexView()
	{
		$organizations = $this
//			->setPresenter()
//			->orderBy('published_at', 'desc')
			->paginate();

		return view('backend.organizations.organizations.index', [
			'organizations' => $organizations,
		]);
	}
}
