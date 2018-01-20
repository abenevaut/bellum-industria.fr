<?php

namespace bellumindustria\Domain\Projects\Projects\Repositories;

use bellumindustria\Infrastructure\Contracts\
{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Projects\Projects\
{
	Repositories\ProjectsRepositoryInterface,
	Project,
	Events\ProjectCreatedEvent,
	Events\ProjectUpdatedEvent,
	Events\ProjectDeletedEvent
};

class ProjectsRepositoryEloquent extends RepositoryEloquentAbstract implements ProjectsRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model(): string
	{
		return Project::class;
	}

	/**
	 * Create project request and fire event "ProjectCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Pages\Projects\Events\ProjectCreatedEvent
	 * @return \bellumindustria\Domain\Projects\Projects\Project
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function create(array $attributes): Project
	{
		$project = parent::create($attributes);

		event(new ProjectCreatedEvent($project));

		return $project;
	}

	/**
	 * Update project request and fire event "ProjectUpdatedEvent".
	 *
	 * @param array $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\Projects\Events\ProjectUpdatedEvent
	 * @return \bellumindustria\Domain\Projects\Projects\Project
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function update(array $attributes, $id): Project
	{
		$project = parent::update($attributes, $id);

		event(new ProjectUpdatedEvent($project));

		return $project;
	}

	/**
	 * Delete project request and fire event "ProjectDeletedEvent".
	 *
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\Projects\Events\ProjectDeletedEvent
	 * @return \bellumindustria\Domain\Projects\Projects\Project
	 */
	public function delete($id): Project
	{
		$project = $this->find($id);

		parent::delete($project->id);

		event(new ProjectDeletedEvent($project));

		return $project;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendIndexView()
	{
		$projects = $this
//			->setPresenter()
//			->orderBy('published_at', 'desc')
			->paginate();

		return view('backend.projects.projects.index', [
			'projects' => $projects,
		]);
	}
}
