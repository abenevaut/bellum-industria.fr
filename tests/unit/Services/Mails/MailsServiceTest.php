<?php
namespace MailsService;

use Helper\Factory;
use App\CVEPDB\Services\Mails\ContactMailService;
use App\Admin\Repositories\Users\LogContactRepositoryEloquent;

class MailsServiceTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $s_contact = null;
    protected $r_contact = null;

    protected function _before() {

        $this->s_contact = new ContactMailService();
        $this->r_contact = \App::make('App\Admin\Repositories\Users\LogContactRepositoryEloquent');
    }

    protected function _after() {
    }

    /**
     *
     */
    public function testMailService()
    {
        $this->tester->haveLogContact(5);

        $this->s_contact->contact_form( $this->r_contact->find(1) );
    }

}