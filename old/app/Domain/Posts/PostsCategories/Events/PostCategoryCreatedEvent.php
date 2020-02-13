<?php

namespace bellumindustria\Domain\Posts\PostsCategories\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Posts\PostsCategories\PostCategory;

class PostCategoryCreatedEvent extends EventAbstract
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
