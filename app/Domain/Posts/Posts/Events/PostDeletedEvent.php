<?php

namespace bellumindustria\Domain\Posts\Posts\Events;

use bellumindustria\Infractucture\Contracts\Events\EventAbstract;
use bellumindustria\Domain\Posts\Posts\Post;

class PostDeletedEvent extends EventAbstract
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
