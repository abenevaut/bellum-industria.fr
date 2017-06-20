<?php

namespace bellumindustria\Http\Controllers\Frontend;

use Carbon\Carbon;
use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\App\Services\TwitterTextFormatter;

class HomeController extends ControllerAbstract
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
					->format('d/m/Y H\hi');

				$tweet->text = TwitterTextFormatter::format_text($tweet);

				return $tweet;
			});

		/**
		 * Youtube
		 */

		// Get channel data by channel name, return an STD PHP object
//		$channel = \Youtube::getChannelByName(config('services.youtube.key'));
//
//		dd($channel);

//		$ytbVideos = \Youtube::listChannelVideos(
//			config('services.youtube.key'),
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
