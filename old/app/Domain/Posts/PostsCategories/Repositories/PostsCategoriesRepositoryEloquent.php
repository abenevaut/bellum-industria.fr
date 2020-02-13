<?php

namespace bellumindustria\Domain\Posts\PostsCategories\Repositories;

use bellumindustria\Infrastructure\Contracts\
{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Posts\PostsCategories\
{
	Repositories\PostsCategoriesRepositoryInterface,
	PostCategory,
	Events\PostCategoryCreatedEvent,
	Events\PostCategoryUpdatedEvent,
	Events\PostCategoryDeletedEvent
};

class PostsCategoriesRepositoryEloquent extends RepositoryEloquentAbstract implements PostsCategoriesRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model(): string
	{
		return PostCategory::class;
	}

	/**
	 * Create post_category request and fire event "PostCategoryCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Pages\PostCategorysCategories\Events\PostCategoryCreatedEvent
	 * @return \bellumindustria\Domain\Posts\PostsCategories\PostCategory
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function create(array $attributes): PostCategory
	{
		$post_category = parent::create($attributes);

		event(new PostCategoryCreatedEvent($post_category));

		return $post_category;
	}

	/**
	 * Update post_category request and fire event "PostCategoryUpdatedEvent".
	 *
	 * @param array $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\PostCategorysCategories\Events\PostCategoryUpdatedEvent
	 * @return \bellumindustria\Domain\Posts\PostsCategories\PostCategory
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function update(array $attributes, $id): PostCategory
	{
		$post_category = parent::update($attributes, $id);

		event(new PostCategoryUpdatedEvent($post_category));

		return $post_category;
	}

	/**
	 * Delete post_category request and fire event "PostCategoryDeletedEvent".
	 *
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\PostCategorysCategories\Events\PostCategoryDeletedEvent
	 * @return \bellumindustria\Domain\Posts\PostsCategories\PostCategory
	 */
	public function delete($id): PostCategory
	{
		$post_category = $this->find($id);

		parent::delete($post_category->id);

		event(new PostCategoryDeletedEvent($post_category));

		return $post_category;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendIndexView()
	{
		$posts_categories = $this
//			->setPresenter()
//			->orderBy('published_at', 'desc')
			->paginate();

		return view('backend.posts.posts_categories.index', [
			'posts_categories' => $posts_categories,
		]);
	}
}
