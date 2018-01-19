<?php namespace abenevaut\Domain\Dashboard\Dashboard\Repositories;

use abenevaut\Domain\Analytics\GoogleAnalytics\Repositories\GoogleAnalyticsRepository;

class DashboardRepository
{

	/**
	 * @var GoogleAnalyticsRepository|null
	 */
	protected $r_google_analytics = null;

	/**
	 * DashboardRepository constructor.
	 *
	 * @param GoogleAnalyticsRepository $r_google_analytics
	 */
	public function __construct(GoogleAnalyticsRepository $r_google_analytics)
	{
		$this->r_google_analytics = $r_google_analytics;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendShowDashboardIndexView()
	{

		$totalVisitorsAndPagesViewsLastWeek = $this
			->r_google_analytics
			->fetchTotalVisitorsAndPageViewsLastWeek();

		return view('backend.dashboard.dashboard.index', [
			'totalVisitorsAndPagesViewsLastWeek' => $totalVisitorsAndPagesViewsLastWeek,
		]);
	}
}
