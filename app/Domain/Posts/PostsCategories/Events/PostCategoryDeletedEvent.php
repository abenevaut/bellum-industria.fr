<?php

namespace abenevaut\Domain\Posts\PostsCategories\Events;

use abenevaut\Infractucture\Contracts\Events\EventAbstract;
use abenevaut\Domain\Posts\PostsCategories\PostCategory;

class PostCategoryDeletedEvent extends EventAbstract
{

	/**
	 * @var null|PostCategory
	 */
	public $post_category = null;

	/**
	 * post_categoryCreatedEvent constructor.
	 *
	 * @param PostCategory $post_category
	 */
	public function __construct(PostCategory $post_category)
	{
		$this->post_category = $post_category;
	}
}
