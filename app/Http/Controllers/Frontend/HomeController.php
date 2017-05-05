<?php

namespace bellumindustria\Http\Controllers\Frontend;

use Carbon\Carbon;
use bellumindustria\Http\Controllers\Controller;

class HomeController extends Controller
{

	public function index() {

		$tweets = \Twitter::getUserTimeline(
			[
				'screen_name' => 'bellumindustria',
				'count'       => 10,
				'format'      => 'array'
			]
		);

		$tweets = collect($tweets)
			->map(function($tweet)
			{

				$tweet['created_at'] = (new Carbon($tweet['created_at']))
					->format('m/d/Y H\hi');

				// The Regular Expression filter
				$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
				// Check if there is a url in the text
				if (preg_match($reg_exUrl, $tweet['text'], $url))
				{
					// make the urls hyper links
					$tweet['text']
						= preg_replace(
						$reg_exUrl,
						'<a href="'
						. $url[0]
						. '" rel="nofollow" target="_blank">'
						. $url[0]
						. '</a>',
						$tweet['text']
					);
				}

				// The Regular Expression filter
				$reg_twitterHashtag = "/(^|[^#\w])#(\w{1,15})\b/";
				// Check if there is a url in the text
				if (preg_match($reg_twitterHashtag, $tweet['text'], $hashTag))
				{
					// make the urls hyper links
					$tweet['text']
						= preg_replace(
						$reg_twitterHashtag,
						'<a href="https://twitter.com/hashtag/'
						. str_replace([' ', '#'], ['', ''], $hashTag[0])
						. '?src=hash" rel="nofollow" target="_blank">'
						. $hashTag[0]
						. '</a>',
						$tweet['text']
					);
				}

				// The Regular Expression filter
				$reg_twitterUsername = "/(^|[^@\w])@(\w{1,15})\b/";
				// Check if there is a url in the text
				if (preg_match($reg_twitterUsername, $tweet['text'], $username))
				{
					// make the urls hyper links
					$tweet['text']
						= preg_replace(
						$reg_twitterUsername,
						'<a href="https://twitter.com/'
						. str_replace([' ', '@'], ['', ''], $username[0])
						. '" rel="nofollow" target="_blank">'
						. $username[0]
						. '</a>',
						$tweet['text']
					);
				}

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
