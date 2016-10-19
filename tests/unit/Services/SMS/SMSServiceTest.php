<?php
namespace SMSService;

use Helper\Factory;
use App\CVEPDB\Services\SMS\TestSMSService;

class SMSServiceTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $s_contact = null;

    protected function _before() {

        $this->s_contact = new TestSMSService();

    }

    protected function _after() {
    }

    /**
     *
     */
    public function testSMSService()
    {
        // $this->s_contact->send_test();
    }

}