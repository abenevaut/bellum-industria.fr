<?php

namespace bellumindustria\Http\Controllers\Frontend;

use Carbon\Carbon;
use bellumindustria\App\Services\TwitterTextFormatter;
use bellumindustria\Http\Controllers\Controller;

class HomeController extends Controller
{

	public function index() {

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

		return view(
			'frontend.home.index',
			[
				'tweets' => $tweets,
			]
		);
	}
}
