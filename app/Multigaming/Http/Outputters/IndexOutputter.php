<?php namespace App\Multigaming\Http\Outputters;

use SimplePie;
use Core\Http\Outputters\FrontOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Modules\Steam\Repositories\SteamGameServerRepository;
use Modules\Steam\Repositories\SteamRepository;
use Modules\ClashOfClan\Repositories\CocRepository;

use App\Multigaming\Repositories\TeamRepository;
use App\Multigaming\Repositories\SMWA\StammRepository;
use App\Multigaming\Repositories\SMWA\SteamBotRepository;


/**
 * Class IndexOutputter
 * @package App\Multigaming\Http\Outputters
 */
class IndexOutputter extends FrontOutputter
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
	 * @var TeamRepository|null
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
		TeamRepository $r_team,
		SteamBotRepository $r_steambot,
	
		CocRepository $r_coc
	)
	{
		parent::__construct($r_settings);

		$this->game_servers = $r_gs;
		$this->steam = $r_steam;
		$this->teams = $r_team;
		$this->stamm = $r_stamm;
		$this->r_steambot = $r_steambot;
		$this->r_coc = $r_coc;

		$this->stamm->init();

		$this->addBreadcrumb('Home', '/');
		$this->setBreadcrumbDivider('<i class="icon-right-dir"></i>');
	}

	/**
	 * @param $data
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$this->title = 'Multigaming#CVEPDB.fr';
		$this->description = 'Multigaming#CVEPDB.fr';


		$coc_clan = [];
		$game_servers = [];
		$trades = [];
		$team_bot = [];
		$team_bellumindustria = [];

		$feed = new SimplePie();
		$feed->set_feed_url("https://steamcommunity.com/groups/Bellum-Industria/rss");
		$feed->enable_cache(true);
		$feed->set_cache_location(storage_path() . '/apps/multigaming/simplepie/cache');
		$feed->set_cache_duration(60 * 60 * 12);
		$feed->set_output_encoding('utf-8');
		$feed->init();

		$game_servers[] = $this->game_servers->find('cvepdb.fr', 27015);
		$game_servers[] = $this->game_servers->find('cvepdb.fr', 27017);

//		$trades = $this->r_steambot->twoLastTrades();
		foreach ($trades as $key => $trade)
		{
			if (is_null($trade->json))
			{
				unset($trades[$key]);
			}
			else
			{
				$trade->json = json_decode(stripslashes($trade->json));
			}

			$trade->trader = $this->steam->playerSummaries(
				$trade->steam_id_trader
			);
		}
//		dd( $trades );

//		$team_bot = $this->teams->findBy('name', 'bot#CVEPDB')->toArray();
		foreach ($team_bot as $tkey => $team)
		{
			foreach ($team['users'] as $ukey => $user)
			{
				$team_bot[$tkey]['users'][$ukey]['steam_token'] = $this->steam->playerSummaries($user['steam_token']);
			}
		}

//		$team_bellumindustria = $this->teams->findBy('name', 'Bellum Industria')->toArray();
		foreach ($team_bellumindustria as $tkey => $team)
		{
			foreach ($team['users'] as $ukey => $user)
			{
				$team_bellumindustria[$tkey]['users'][$ukey]['steam_token'] = $this->steam->playerSummaries($user['steam_token']);
			}
		}

		//$this->test();

		return $this->output(
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

	/**
	 * @param $data
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function boutique()
	{
		$this->addBreadcrumb('Boutique', '/multigaming/boutique');

		return $this->output('app.multigaming.boutique', []);
	}

	/**
	 * @param $data
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function challenge()
	{
		$this->addBreadcrumb('Challenge', '/multigaming/challenge');

		return $this->output('cvepdb.multigaming.challenge', []);
	}

	public function messageoftheday()
	{

		$team_bot = $this->teams->findBy('name', 'bot#CVEPDB')->toArray();

		foreach ($team_bot as $tkey => $team)
		{
			foreach ($team['users'] as $ukey => $user)
			{
				$team_bot[$tkey]['users'][$ukey]['steam_token'] = $this->steam->playerSummaries($user['steam_token']);
			}
		}

		$this->addBreadcrumb('Message of the day', '/multigaming/message-of-the-day');

		return $this->output(
			'cvepdb.multigaming.messageoftheday',
			[
				'team_bot' => $team_bot,
				'threads'  => $this->steam->paginate('Bellum-Industria', 4)
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
}
