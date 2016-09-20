<?php namespace cms\Multigaming\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use cms\Multigaming\Repositories\SMWA\StammRepository;
use cms\Multigaming\Repositories\SMWA\SteamBotRepository;
use cms\Infrastructure\Abstractions\Controllers\FrontendController;
use cms\Domain\Settings\Settings\Repositories\SettingsRepository;
use cms\Modules\Steam\Domain\Steam\Steam\Repositories\SteamRepository;
use cms\Modules\Teams\Domain\Teams\Teams\Repositories\TeamsRepositoryEloquent;

/**
 * Class IndexController
 * @package cms\Multigaming\Http\Controllers
 */
class IndexController extends FrontendController
{

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
	 * @var SteamBotRepository|null
	 */
	protected $r_steambot = null;

	public function __construct(
		SettingsRepository $r_settings,

		SteamRepository $r_steam,

		StammRepository $r_stamm,
		TeamsRepositoryEloquent $r_team,
		SteamBotRepository $r_steambot
	)
	{

		$this->steam = $r_steam;
		$this->teams = $r_team;
		$this->stamm = $r_stamm;
		$this->r_steambot = $r_steambot;

		$this->stamm->init();
	}

	public function index()
	{
		$this->title = 'Multigaming#CVEPDB.fr';
		$this->description = 'Multigaming#CVEPDB.fr';

		$trades = [];
		$team_bot = [];
		$team_bellumindustria = [];

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
				'trades'               => $trades,
			]
		);
	}

	public function announcements()
	{
		return view(
			'app.multigaming.announcements',
			[
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
//		dd(
//			$this->steam->playerSummaries( 76561197987229786 )
//		);


//		dd(
//			$this->stamm->getPlayer(
//				$this->steam->convertCommunityIdToSteamId( 76561197987229786 )
//			)
//		);

//		dd(
//			$this->stamm->all()
//		);

//        dd( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_1') );


		# ADD POINTS

//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );
//        $this->stamm->addStammPointsToPlayer('STEAM_0:0:13482029', 100);
//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );


		# SUB POINTS

//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );
//        $this->stamm->delStammPointsToPlayer('STEAM_0:0:13482029', 100);
//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );


		$ranks = Cache::remember('ranks', 60, function ()
		{
			$ranks = $this->stamm->all();

			$ranks = collect($ranks)
				->map(function ($server, $server_name)
				{
					return collect($server)->sortBy('points')->reverse();
				});

			return $ranks;
		});
		unset($ranks['sm_multigaming_csgo_2']);

		return view(
			'app.multigaming.ranks',
			[
				'ranks'        => $ranks,
			]
		);

	}

	public function messageoftheday()
	{
//		$team_bot = $this->teams->findByField('reference', 'bots')->first();
//		foreach ($team_bot->users as $user)
//		{
//			$user->steam_summaries = $this->steam->playerSummaries(
//				$user->tokens->where('provider', 'steam')->first()->token
//			);
//		}
//
//		$trades = $this->r_steambot->lastTrades();
//		foreach ($trades as $key => $trade)
//		{
//			if (is_null($trade->json))
//			{
//				unset($trades[$key]);
//			}
//			else
//			{
//				$trades[$key]->json = json_decode($trade->json);
//				$trades[$key]->trader = $this->steam->playerSummaries(
//					$trade->steam_id_trader
//				);
//			}
//		}

		return view(
			'app.multigaming.messageoftheday',
			[
//				'team_bot' => $team_bot,
//				'trades'   => $trades
			]
		);
	}

	public function sitemap()
	{
//		return $this->generateSitemapIndex(
//			[
//				'sitemap-multigaming-teams.xml',
//				'sitemap-multigaming-coc.xml'
//			],
//			'sitemap-multigaming-index',
//			3600
//		);
	}

}
