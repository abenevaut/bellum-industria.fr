<?php

namespace Tests\Feature\Http\Controllers\Frontend;

use Tests\TestCase;
use Blackfire\Bridge\PhpUnit\TestCaseTrait;
use Blackfire\Profile;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactsControllerTest extends TestCase
{
//	use TestCaseTrait;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//		$config = new Profile\Configuration();

        $response = $this->get('/contacts');

        $response->assertStatus(200);

		// define some assertions
//		$config
//			->assert('metrics.sql.queries.count < 5', 'SQL queries');
//
//		$profile = $this->assertBlackfire($config, function () {
//			// do something that you want to profile
//			// and assertions are going to be executed against it
//		});
    }
}
