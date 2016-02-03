<?php

namespace App\CVEPDB\Domain\Services\SMS;

interface ISMSService
{
    /**
     * @param string $message
     * @return mixed
     */
    public function send($message);
}