<?php

namespace App\CVEPDB\Domain\Services\SMS;

use GuzzleHttp\Client as GuzzleHttpClient;

abstract class SMSService implements ISMSService
{
    /**
     * @param string $number A phone number
     * @param string $message
     * @return mixed
     */
    public function send($message)
    {
        $user = env('SMS_USER');
        $pass = env('SMS_PASSWORD');
        $purl = 'https://smsapi.free-mobile.fr/sendmsg?user='.$user.'&pass='.$pass.'&msg='.urlencode($message);

        $client = new GuzzleHttpClient();
        $client->request('GET', $purl);
    }
}