<?php

use Blackfire\Bridge\PhpUnit\TestCaseTrait;
use Blackfire\Profile;

class BlackFireExampleTest extends \PHPUnit_Framework_TestCase
{
    use TestCaseTrait;

    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    /**
     * Todo : prenium blackfire account
     *
     * @group blackfire
     * @requires extension blackfire
     */
    public function testSomething()
    {
        $config = new Profile\Configuration();

        // define some assertions
        $config->assert('metrics.sql.queries.count < 5', 'SQL queries');

        $profile = $this->assertBlackfire($config, function () {

            $i = 100000;

            while ($i) {
                $i--;
            }

        });
    }
}
