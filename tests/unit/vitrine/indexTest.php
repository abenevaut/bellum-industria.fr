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
        //$this->tester->haveUsers(40);
        $user = $this->tester->produce(Factory::m_user);

        //var_dump($user); exit;

        $this->assertEquals(0, $user->count());
    }

}