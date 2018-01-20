<?php

namespace bellumindustria\Domain\Projects\Folios\Repositories;

use bellumindustria\Infrastructure\Contracts\
{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Projects\Folios\
{
	Repositories\FoliosRepositoryInterface,
	Folio,
	Events\FolioCreatedEvent,
	Events\FolioUpdatedEvent,
	Events\FolioDeletedEvent
};

class FoliosRepositoryEloquent extends RepositoryEloquentAbstract implements FoliosRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model(): string
	{
		return Folio::class;
	}

	/**
	 * Create folio request and fire event "FolioCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Pages\Folios\Events\FolioCreatedEvent
	 * @return \bellumindustria\Domain\Projects\Folios\Folio
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function create(array $attributes): Folio
	{
		$folio = parent::create($attributes);

		event(new FolioCreatedEvent($folio));

		return $folio;
	}

	/**
	 * Update folio request and fire event "FolioUpdatedEvent".
	 *
	 * @param array $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\Folios\Events\FolioUpdatedEvent
	 * @return \bellumindustria\Domain\Projects\Folios\Folio
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function update(array $attributes, $id): Folio
	{
		$folio = parent::update($attributes, $id);

		event(new FolioUpdatedEvent($folio));

		return $folio;
	}

	/**
	 * Delete folio request and fire event "FolioDeletedEvent".
	 *
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\Folios\Events\FolioDeletedEvent
	 * @return \bellumindustria\Domain\Projects\Folios\Folio
	 */
	public function delete($id): Folio
	{
		$folio = $this->find($id);

		parent::delete($folio->id);

		event(new FolioDeletedEvent($folio));

		return $folio;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendIndexView()
	{
		$folios = $this
//			->setPresenter()
//			->orderBy('published_at', 'desc')
			->paginate();

		return view('backend.projects.folios.index', [
			'folios' => $folios,
		]);
	}
}
