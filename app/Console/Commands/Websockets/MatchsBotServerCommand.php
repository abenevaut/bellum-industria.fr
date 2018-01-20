<?php namespace bellumindustria\Console\Commands\Websockets;

use Illuminate\Console\Command;
use Ollyxar\WebSockets\Server;

class MatchsBotServerCommand extends Command
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'bellumindustria:matchs-bot:run';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'WebSockets CS:GO matchs bot server starter.';

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function handle(): void
	{
		$this->info("starting server...");

		$server = new Server(
			config('websockets.matchs-bot.host'),
			config('websockets.matchs-bot.port'),
			config('websockets.matchs-bot.worker_count'),
			config('websockets.matchs-bot.use_ssl')
		);

		if (config('websockets.matchs-bot.use_ssl')) {
			$this->info("Setting up SSL...");
			$server
				->setCert(config('websockets.matchs-bot.cert'))
				->setPassPhrase(config('websockets.matchs-bot.cert_pass_phrase'));
		}

		$server->setHandler(config('websockets.matchs-bot.handler'));
		$server->run();
	}
}