<?php

namespace abenevaut\Domain\Socials\Twitter\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use abenevaut\App\Services\TwitterTextFormatter;

class TwitterRepository
{

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function getPublication(): Collection
	{
		$tweets = null;
		$tweet_cache_key = 'TwitterRepository.getPublication.tweets';

		if (\Cache::has($tweet_cache_key)) {
			$tweets = \Cache::get($tweet_cache_key);
		} else {
			$tweets = \Twitter::getUserTimeline(
				[
					'screen_name' => 'abenevaut',
					'count' => 4,
					'format' => 'object'
				]
			);
			$expiresAt = Carbon::now()->addMinutes(360);
			\Cache::put($tweet_cache_key, $tweets, $expiresAt);
		}

		return collect($tweets)
			->map(function ($tweet) {

				$tweet->created_at = (new Carbon($tweet->created_at))
					->format('d/m/Y H\hi');

				$tweet->text = TwitterTextFormatter::format_text($tweet);

				return $tweet;
			});
	}
}
