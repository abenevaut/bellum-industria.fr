<?php

namespace bellumindustria\Domain\Pages\Home\Repositories;

use Carbon\Carbon;
use bellumindustria\App\Services\OpenGraph;
use bellumindustria\Domain\Socials\Twitter\Repositories\TwitterRepository;

class HomeRepository
{

	/**
	 * @var TwitterRepository|null
	 */
	protected $r_twitter = null;

	/**
	 * HomeController constructor.
	 *
	 * @param TwitterRepository $r_twitter
	 */
	public function __construct(TwitterRepository $r_twitter) {
		$this->r_twitter = $r_twitter;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function frontendShowHomeIndexView()
	{
		$tweets = null;
		$tweet_cache_key = 'HomeRepository.frontendShowHomeIndexView.tweets.' . \Session::get('locale');

		if (\Cache::has($tweet_cache_key)) {
			$tweets = \Cache::get($tweet_cache_key);
		} else {
			$tweets = $this
				->r_twitter
				->getPublication()
				->map(function ($tweet) {
					$tweet->open_graph = null;

					if (isset($tweet->entities->urls)) {
						collect($tweet->entities->urls)
							->each(function ($url) use ($tweet) {
								$tweet->open_graph = OpenGraph::fetch(
									$url->expanded_url
								);
								if (isset($tweet->open_graph->image)) {
									return false; // break each
								}
							})
						;
					}

					return $tweet;
				})
			;
			$expiresAt = Carbon::now()->addMinutes(360);
			\Cache::put($tweet_cache_key, $tweets, $expiresAt);
		}

		return view(
			'frontend.pages.home.index', [
				'metadata' => [
					'title' => 'Antoine Benevaut',
				],
				'tweets' => $tweets,
			]
		);
	}
}
