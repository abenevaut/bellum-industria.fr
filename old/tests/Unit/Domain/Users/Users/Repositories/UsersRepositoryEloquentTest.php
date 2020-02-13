<?php

namespace Tests\Unit\Domain\Users\Users\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use bellumindustria\Domain\Users\Users\Repositories\UsersRepositoryEloquent;

class UsersRepositoryEloquentTest extends TestCase
{

	/**
	 * @var UsersRepositoryEloquent|null
	 */
	protected $r_users = null;

	public function __construct()
	{
		parent::__construct();

		$this->r_users = app()->make(UsersRepositoryEloquent::class);
	}

    /**
     * Check if repository is correctly instantiated.
     *
     * @return void
     */
    public function testCheckIfRepositoryIsCorrectlyInstantiated()
    {
        $this->assertTrue(
        	$this->r_users instanceof UsersRepositoryEloquent
		);
    }
}
