<?php

namespace bellumindustria\Domain\Posts\Posts\Repositories;

use bellumindustria\Infrastructure\Contracts\
{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Posts\Posts\
{
	Repositories\PostsRepositoryInterface,
	Post,
	Events\PostCreatedEvent,
	Events\PostUpdatedEvent,
	Events\PostDeletedEvent
};

class PostsRepositoryEloquent extends RepositoryEloquentAbstract implements PostsRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model(): string
	{
		return Post::class;
	}

	/**
	 * Create post request and fire event "PostCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Pages\Posts\Events\PostCreatedEvent
	 * @return \bellumindustria\Domain\Posts\Posts\Post
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function create(array $attributes): Post
	{
		$post = parent::create($attributes);

		event(new PostCreatedEvent($post));

		return $post;
	}

	/**
	 * Update post request and fire event "PostUpdatedEvent".
	 *
	 * @param array $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\Posts\Events\PostUpdatedEvent
	 * @return \bellumindustria\Domain\Posts\Posts\Post
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function update(array $attributes, $id): Post
	{
		$post = parent::update($attributes, $id);

		event(new PostUpdatedEvent($post));

		return $post;
	}

	/**
	 * Delete post request and fire event "PostDeletedEvent".
	 *
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\Posts\Events\PostDeletedEvent
	 * @return \bellumindustria\Domain\Posts\Posts\Post
	 */
	public function delete($id): Post
	{
		$post = $this->find($id);

		parent::delete($post->id);

		event(new PostDeletedEvent($post));

		return $post;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendIndexView()
	{
		$posts = $this
//			->setPresenter()
//			->orderBy('published_at', 'desc')
			->paginate();

		return view('backend.posts.posts.index', [
			'posts' => $posts,
		]);
	}
}
