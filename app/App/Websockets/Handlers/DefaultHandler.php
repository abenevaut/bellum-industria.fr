<?php namespace bellumindustria\App\Websockets\Handlers;

use Ollyxar\LaravelAuth\FileAuth;
use Ollyxar\WebSockets\Frame;
use Ollyxar\WebSockets\Worker;
use bellumindustria\Domain\Users\Users\User;

class DefaultHandler extends Worker
{

	/**
	 * Connected users
	 *
	 * @var array
	 */
	protected $users = [];

	private function fillUser(array $headers, $socket): bool
	{
		if ($userId = FileAuth::getUserIdByHeaders($headers)) {
			// allow only one connection for worker per user
			if (!in_array($userId, $this->users)) {
				$this->users[(int)$socket] = $userId;
				return true;
			}
		}

		return false;
	}

	/**
	 * @param $client
	 */
	protected function onConnect($client): void
	{
		$userName = User::where('id', (int)$this->users[(int)$client])->first()->name;

		$this->sendToAll(Frame::encode(json_encode([
			'type'    => 'system',
			'message' => $userName . ' connected.'
		])));
	}

	/**
	 * @param array $headers
	 * @param $socket
	 * @return bool
	 */
	protected function afterHandshake(array $headers, $socket): bool
	{
		return $this->fillUser($headers, $socket);
	}

	/**
	 * @param $clientNumber
	 */
	protected function onClose($clientNumber): void
	{
		$userName = User::where('id', (int)$this->users[$clientNumber])->first()->name;

		$this->sendToAll(Frame::encode(json_encode([
			'type'    => 'system',
			'message' => $userName . " disconnected."
		])));

		unset($this->users[$clientNumber]);
	}

	/**
	 * @param string $message
	 * @param int $socketId
	 */
	protected function onDirectMessage(string $message, int $socketId): void
	{
		$message = json_decode($message);
		$userName = User::where('id', (int)$this->users[$socketId])->first()->name;
		$userMessage = $message->message;

		$response = Frame::encode(json_encode([
			'type'    => 'usermsg',
			'name'    => $userName,
			'message' => $userMessage
		]));

		$this->sendToAll($response);
	}
}
