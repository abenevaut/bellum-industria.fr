<?php namespace cms\Multigaming\Http\Controllers;

use SimplePie;
use Illuminate\Support\Facades\Cache;
use cms\Multigaming\Repositories\SMWA\StammRepository;
use cms\Multigaming\Repositories\SMWA\SteamBotRepository;
use cms\Infrastructure\Abstractions\Controllers\FrontendController;
use cms\Domain\Settings\Settings\Repositories\SettingsRepository;
use cms\Modules\Steam\Domain\Steam\Repositories\SteamGameServerRepository;
use cms\Modules\Steam\Domain\Steam\Repositories\SteamRepository;
use cms\Modules\ClashOfClan\Domain\Coc\CocApi\Repositories\CocRepository;
use cms\Modules\Teams\Domain\Teams\Teams\Repositories\TeamsRepositoryEloquent;

/**
 * Class IndexController
 * @package App\Multigaming\Http\Controllers
 */
class IndexController extends FrontendController
{

	/**
	 * @var SteamGameServerRepository|null
	 */
	protected $game_servers = null;

	/**
	 * @var SteamRepository|null
	 */
	protected $steam = null;

	/**
	 * @var StammRepository|null
	 */
	protected $stamm = null;

	/**
	 * @var TeamsRepositoryEloquent|null
	 */
	protected $teams = null;

	/**
	 * @var CocRepository|null
	 */
	protected $r_coc = null;

	/**
	 * @var SteamBotRepository|null
	 */
	protected $r_steambot = null;

	public function __construct(
		SettingsRepository $r_settings,

		SteamGameServerRepository $r_gs,
		SteamRepository $r_steam,

		StammRepository $r_stamm,
		TeamsRepositoryEloquent $r_team,
		SteamBotRepository $r_steambot,

		CocRepository $r_coc
	)
	{
		$this->game_servers = $r_gs;
		$this->steam = $r_steam;
		$this->teams = $r_team;
		$this->stamm = $r_stamm;
		$this->r_steambot = $r_steambot;
		$this->r_coc = $r_coc;

		$this->stamm->init();
	}

	public function index()
	{
		$this->title = 'Multigaming#CVEPDB.fr';
		$this->description = 'Multigaming#CVEPDB.fr';


		$coc_clan = [];
		$game_servers = [];
		$trades = [];
		$team_bot = [];
		$team_bellumindustria = [];


		$feed = Cache::remember('announcements', 60, function() {

			$feed = new SimplePie();
			$feed->set_feed_url("https://steamcommunity.com/groups/Bellum-Industria/rss");
			$feed->enable_cache(true);
			$feed->set_cache_location(storage_path('framework/cache'));
			$feed->set_cache_duration(60 * 60 * 12);
			$feed->set_output_encoding('utf-8');
			$feed->init();

			return $feed;
		});



		$game_servers[] = $this->game_servers->find('cvepdb.fr', 27015);
		$game_servers[] = $this->game_servers->find('cvepdb.fr', 27017);

		$trades = $this->r_steambot->lastTrades();
		foreach ($trades as $key => $trade)
		{
			if (is_null($trade->json))
			{
				unset($trades[$key]);
			}
			else
			{
				$trades[$key]->json = json_decode($trade->json);
				$trades[$key]->trader = $this->steam->playerSummaries(
					$trade->steam_id_trader
				);
			}
		}

		$team_bot = $this->teams->findByField('reference', 'bots')->first();
		foreach ($team_bot->users as $user)
		{
			$user->steam_summaries = $this->steam->playerSummaries(
				$user->tokens->where('provider', 'steam')->first()->token
			);
		}

		$team_bellumindustria = $this->teams->findByField('reference', 'bellum-industria')->first();
		foreach ($team_bellumindustria->users as $user)
		{
			$user->steam_summaries = $this->steam->playerSummaries(
				$user->tokens->where('provider', 'steam')->first()->token
			);
		}

		//$this->test();

		return view(
			'app.multigaming.index',
			[
				'team_bot'             => $team_bot,
				'team_bellumindustria' => $team_bellumindustria,
				'announcements'        => $feed->get_items(0, 2),
				'threads'              => $this->steam->paginate('Bellum-Industria', 4),
				'game_servers'         => $game_servers,
				'coc_clan'             => $this->r_coc->getClan('#PY2UJ8C0'),
				'trades'               => $trades,
			]
		);
	}

	public function announcements()
	{
		$feed = Cache::remember('announcements', 60, function() {
			$feed = new SimplePie();
			$feed->set_feed_url("https://steamcommunity.com/groups/Bellum-Industria/rss");
			$feed->enable_cache(true);
			$feed->set_cache_location(storage_path('framework/cache'));
			$feed->set_cache_duration(60 * 60 * 12);
			$feed->set_output_encoding('utf-8');
			$feed->init();

			return $feed;
		});

		return view(
			'app.multigaming.announcements',
			[
				'announcements' => $feed->get_items(0, 5),
			]
		);
	}

	public function boutique()
	{
		return view('app.multigaming.boutique', []);
	}

	public function challenge()
	{
		return view('app.multigaming.challenge', []);
	}

	public function ranks()
	{
		//        dd( $this->stamm->getPlayer('STEAM_0:0:13482029') );

//        dd( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_1') );


		# ADD POINTS

//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );
//        $this->stamm->addStammPointsToPlayer('STEAM_0:0:13482029', 100);
//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );


		# SUB POINTS

//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );
//        $this->stamm->delStammPointsToPlayer('STEAM_0:0:13482029', 100);
//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );

	}

	public function messageoftheday()
	{
		$team_bot = $this->teams->findByField('reference', 'bots')->first();
		foreach ($team_bot->users as $user)
		{
			$user->steam_summaries = $this->steam->playerSummaries(
				$user->tokens->where('provider', 'steam')->first()->token
			);
		}

		$trades = $this->r_steambot->lastTrades();
		foreach ($trades as $key => $trade)
		{
			if (is_null($trade->json))
			{
				unset($trades[$key]);
			}
			else
			{
				$trades[$key]->json = json_decode($trade->json);
				$trades[$key]->trader = $this->steam->playerSummaries(
					$trade->steam_id_trader
				);
			}
		}

		return view(
			'app.multigaming.messageoftheday',
			[
				'team_bot' => $team_bot,
				'threads'  => $this->steam->paginate('Bellum-Industria', 4),
				'trades'   => $trades
			]
		);
	}

	public function sitemap()
	{
		return $this->generateSitemapIndex(
			[
				'sitemap-multigaming-teams.xml',
				'sitemap-multigaming-coc.xml'
			],
			'sitemap-multigaming-index',
			3600
		);
	}

}
