<?php
namespace vitrine;

use Helper\Factory;

class indexTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {
        $user = $this->tester->produce(Factory::m_user);
        $this->assertEquals(0, $user->num_posts);
    }

}