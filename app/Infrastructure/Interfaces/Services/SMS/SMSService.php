<?php namespace CVEPDB\Contracts\Services\SMS;

/**
 * Interface SMSService
 * @package CVEPDB\Contracts\Services\SMS
 */
interface SMSService
{

	/**
	 * @param $number
	 * @param $message
	 *
	 * @return mixed
	 */
    public function sendTo(array $numbers = [], $message);
}
