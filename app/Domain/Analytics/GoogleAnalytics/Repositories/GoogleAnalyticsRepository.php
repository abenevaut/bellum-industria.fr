<?php

namespace abenevaut\Domain\Analytics\GoogleAnalytics\Repositories;

use \Illuminate\Support\Collection;
use Spatie\Analytics\Period;

class GoogleAnalyticsRepository
{

	const PERIOD_A_WEEK = 7;

	/**
	 * @return Collection
	 */
	public function fetchTotalVisitorsAndPageViewsLastWeek(): Collection
	{
		return \Analytics::fetchTotalVisitorsAndPageViews(Period::days(self::PERIOD_A_WEEK));
	}

	/**
	 * @return \Google_Service_Analytics
	 */
	public function getAnalyticsService(): \Google_Service_Analytics
	{
		return \Analytics::getAnalyticsService();
	}
}
