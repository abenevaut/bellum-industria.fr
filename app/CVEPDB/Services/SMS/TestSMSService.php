<?php

namespace App\CVEPDB\Services\SMS;

use CVEPDB\Services\SMS\SMSService;

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