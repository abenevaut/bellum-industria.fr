<?php

namespace bellumindustria\Http\Controllers\Frontend;

use Carbon\Carbon;
use bellumindustria\App\Services\TwitterTextFormatter;
use bellumindustria\Http\Controllers\Controller;

class HomeController extends Controller
{

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {

		/*
		 * Tweets
		 */

		$tweets = \Twitter::getUserTimeline(
			[
				'screen_name' => 'bellumindustria',
				'count'       => 9,
				'format'      => 'object'
			]
		);

		$tweets = collect($tweets)
			->map(function($tweet)
			{

				$tweet->created_at = (new Carbon($tweet->created_at))
					->format('m/d/Y H\hi');

				$tweet->text = TwitterTextFormatter::format_text($tweet);

				return $tweet;
			});

		/**
		 * Youtube
		 */

		// Get channel data by channel name, return an STD PHP object
//		$channel = \Youtube::getChannelByName(env('BI_YOUTUBE_CHANNEL_ID'));
//
//		dd($channel);

//		$ytbVideos = \Youtube::listChannelVideos(
//			env('BI_YOUTUBE_CHANNEL_ID'),
//			10
//		);
//
//		dd($ytbVideos);

		return view(
			'frontend.home.index',
			[
				'tweets' => $tweets,
//				'ytbVideos' => $ytbVideos,
			]
		);
	}
}
