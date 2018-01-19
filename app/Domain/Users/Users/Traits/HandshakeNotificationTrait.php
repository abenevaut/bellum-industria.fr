<?php namespace abenevaut\Domain\Users\Users\Traits;

use abenevaut\Domain\Users\Users\Notifications\HandshakeMailToConfirmReceptionToSender;

/**
 * Trait HandshakeNotificationTrait
 *
 * The implemented entity have to set `$fillable = ['civility', 'first_name', 'last_name', 'email']` and
 * implement `NamableTrait`.
 */
trait HandshakeNotificationTrait
{

	/**
	 * Send the handshake confirmation email.
	 *
	 * @param $subject
	 * @param $body
	 *
	 * @return $this
	 */
	public function sendHandshakeMailToConfirmReceptionToSenderNotification($subject, $body)
	{
		$this->notify(new HandshakeMailToConfirmReceptionToSender($this, $subject, $body));

		return $this;
	}
}
