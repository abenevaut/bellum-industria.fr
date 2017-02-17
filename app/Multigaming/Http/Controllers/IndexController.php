<?php namespace cms\Multigaming\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use cms\Multigaming\Repositories\SMWA\StammRepository;
use cms\Multigaming\Repositories\SMWA\SteamBotRepository;
use cms\Infrastructure\Abstractions\Controllers\FrontendController;
use cms\Modules\Steam\Domain\Steam\Steam\Repositories\SteamRepository;
use cms\Modules\Teams\Domain\Teams\Teams\Repositories\TeamsRepositoryEloquent;

/**
 * Class IndexController
 * @package cms\Multigaming\Http\Controllers
 */
class IndexController extends FrontendController
{

	/*
	 * https://steamcommunity.com/groups/Bellum-Industria/memberslistxml/?xml=1
	 */

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

	/**
	 * IndexController constructor.
	 *
	 * @param SteamRepository         $r_steam
	 * @param StammRepository         $r_stamm
	 * @param TeamsRepositoryEloquent $r_team
	 * @param SteamBotRepository      $r_steambot
	 */
	public function __construct(
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
		$this->title = 'www.bellum-industria.fr';
		$this->description = 'www.bellum-industria.fr';

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

		if (!is_null($team_bot))
		{
			foreach ($team_bot->users as $user)
			{
				$user->steam_summaries = $this->steam->playerSummaries(
					$user->tokens->where('provider', 'steam')->first()->token
				);
			}
		}

		$team_bellumindustria = $this->teams->findByField('reference', 'bellum-industria')->first();

		if (!is_null($team_bellumindustria))
		{
			foreach ($team_bellumindustria->users as $user)
			{
				$user->steam_summaries = $this->steam->playerSummaries(
					$user->tokens->where('provider', 'steam')->first()->token
				);
			}
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
		return view('app.multigaming.announcements', []);
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
				'ranks' => $ranks,
			]
		);
	}

	public function messageoftheday()
	{
		return view('app.multigaming.messageoftheday', []);
	}

	public function buy_stamm_points()
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
