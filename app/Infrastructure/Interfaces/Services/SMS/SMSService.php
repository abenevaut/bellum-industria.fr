<?php namespace CVEPDB\Contracts\Services\SMS;

/**
 *
 */
interface SMSService
{
    /**
     * @param string $message
     * @return mixed
     */
    public function send($message);
}
