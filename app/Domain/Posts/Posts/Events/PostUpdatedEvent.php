<?php

namespace abenevaut\Domain\Posts\Posts\Events;

use abenevaut\Infractucture\Contracts\Events\EventAbstract;
use abenevaut\Domain\Posts\Posts\Post;

class PostUpdatedEvent extends EventAbstract
{

	/**
	 * @var null|Post
	 */
	public $post = null;

	/**
	 * postCreatedEvent constructor.
	 *
	 * @param Post $post
	 */
	public function __construct(Post $post)
	{
		$this->post = $post;
	}
}
