<?php

namespace App\CVEPDB\Domain\Services\SMS;

class TestSMSService extends SMSService
{
    /**
     * Vitrine contact form - App\CVEPDB\Vitrine\Controllers\ContactController
     */
    public function send_test()
    {
        $this->send('Message test');
    }
}