<?php namespace CVEPDB\Abstracts\Services\SMS;

use GuzzleHttp\Client as GuzzleHttpClient;
use CVEPDB\Contracts\Services\SMS\SMSService as ISMSService;

/**
 * Class SMSService
 * @package CVEPDB\Abstracts\Services\SMS
 */
abstract class SMSService implements ISMSService
{
    /**
     * @param string $number A phone number
     * @param string $message
     * @return mixed
     */
    public function send($message)
    {
        $user = config('cvepdb.sms_user');
        $pass = config('cvepdb.sms_password');
        $purl = 'https://smsapi.free-mobile.fr/sendmsg?user='.$user.'&pass='.$pass.'&msg='.urlencode($message);

        $client = new GuzzleHttpClient();
        $client->request('GET', $purl);
    }
}
