<?php

namespace Tests\Unit\Domain\Users\Profiles\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use bellumindustria\Domain\Users\Profiles\Repositories\ProfilesRepositoryEloquent;

class ProfilesRepositoryEloquentTest extends TestCase
{

	/**
	 * @var ProfilesRepositoryEloquent|null
	 */
	protected $r_users = null;

	public function __construct()
	{
		parent::__construct();

		$this->r_users = app()->make(ProfilesRepositoryEloquent::class);
	}

    /**
     * Check if repository is correctly instantiated.
     *
     * @return void
     */
    public function testCheckIfRepositoryIsCorrectlyInstantiated()
    {
        $this->assertTrue(
        	$this->r_users instanceof ProfilesRepositoryEloquent
		);
    }
}
