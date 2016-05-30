<?php namespace Modules\Steam\Repositories;

use Illuminate\Http\Request;
use CVEPDB\Settings\Facades\Settings;
use Invisnik\LaravelSteamAuth\SteamAuth as InvisnikSteamAuth;
use Invisnik\LaravelSteamAuth\SteamInfo as InvisnikSteamInfo;

/**
 * Class SteamAuth
 * @package Modules\Steam\Repositories
 */
class SteamAuth extends InvisnikSteamAuth
{

	/**
	 * SteamAuth constructor.
	 *
	 * @param Request $request
	 */
	public function __construct(Request $request)
	{
		parent::__construct($request);
	}

	/**
	 * Get user data from steam api
	 *
	 * @return void
	 */
	public function parseInfo()
	{
		if (!is_null($this->steamId))
		{
			$json = file_get_contents(
       sprintf(
       self::STEAM_INFO_URL,
       Settings::get('steam.api_key'),
       $this->steamId
       )
			);
			$json = json_decode($json, true);
			$this->steamInfo = new InvisnikSteamInfo($json["response"]["players"][0]);
		}
	}

}
