<?php namespace cms\Multigaming\App\Widgets\ShowVakarmNews;

use SimplePie;
use Illuminate\Support\Facades\Cache;
use cms\Infrastructure\Abstractions\Widgets\WidgetsAbstract;

/**
 * Class ShowCommunityGroupAnnouncements
 * @package cms\Modules\Steam\App\Widgets\ShowCommunityGroupAnnouncements
 */
class ShowVakarmNews extends WidgetsAbstract
{

	/**
	 * @var string Widget title
	 */
	protected $title = 'Steam show community announcements';

	/**
	 * @var string Widget description
	 */
	protected $description = 'Display Steam community group announcements';

	/**
	 * @param string $name
	 * @param array  $attributes
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
	 */
	public function register($nb_of_news = 2, $attributes = [])
	{
		$feeds = Cache::remember('vakarm', 60, function ()
		{
			$feeds = new SimplePie();
			$feeds->set_feed_url("http://feeds2.feedburner.com/vakarm");
			$feeds->enable_cache(true);
			$feeds->set_cache_location(storage_path('framework/cache'));
			$feeds->set_cache_duration(60 * 60 * 12);
			$feeds->set_output_encoding('utf-8');
			$feeds->init();

			return $feeds;
		});

		return $this->output(
			'app.multigaming.widgets.showvakarmnews',
			[
				'announcements' => $feeds->get_items(0, $nb_of_news),
			]
		);
	}

}
