<?php namespace bellumindustria\Console\Commands\Websockets;

use Illuminate\Console\Command;
use Ollyxar\WebSockets\Server as WServer;
use Ollyxar\WebSockets\Frame;

class MatchsBotTestServerCommand extends Command
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'bellumindustria:matchs-bot:test';

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'bellumindustria:matchs-bot:test {message}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'WebSockets CS:GO matchs bot test server starter.';

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function handle(): void
	{
		$socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
		socket_connect($socket, WServer::$connector);

		$data = new \stdClass();
		$data->type = 'system';
		$data->message = $this->argument('message');
		$msg = Frame::encode(json_encode($data));

		socket_write($socket, $msg);
		socket_close($socket);
		$this->info("Message sent.");
	}
}
