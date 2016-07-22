<?php namespace cms\App\Factories;

use Illuminate\Mail\TransportManager;
use Swift_SmtpTransport as SmtpTransport;
use CVEPDB\Settings\Facades\Settings;

/**
 * Class MailTransportManagerFactory
 * @package cms\App\Factories
 */
class MailTransportManagerFactory extends TransportManager
{

	/**
	 * Create an instance of the SMTP Swift Transport driver.
	 *
	 * @return \Swift_SmtpTransport
	 */
	protected function createSmtpDriver()
	{
		$config = [
			'driver'     => Settings::get('mail.driver'),
			'host'       => Settings::get('mail.host'),
			'port'       => Settings::get('mail.port'),
			'username'   => Settings::get('mail.username'),
			'password'   => Settings::get('mail.password'),
			'encryption' => Settings::get('mail.encryption'),
		];

		// The Swift SMTP transport instance will allow us to use any SMTP backend
		// for delivering mail such as Sendgrid, Amazon SES, or a custom server
		// a developer has available. We will just pass this configured host.
		$transport = SmtpTransport::newInstance(
			$config['host'],
			$config['port']
		);

		if (isset($config['encryption']))
		{
			$transport->setEncryption($config['encryption']);
		}

		// Once we have the transport we will check for the presence of a username
		// and password. If we have it we will set the credentials on the Swift
		// transporter instance so that we'll properly authenticate delivery.
		if (isset($config['username']))
		{
			$transport->setUsername($config['username']);

			$transport->setPassword($config['password']);
		}

		return $transport;
	}
}
