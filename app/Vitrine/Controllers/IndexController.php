<?php

namespace App\Vitrine\Controllers;

use Illuminate\Http\Request as Request;
use CVEPDB\Controllers\AbsBaseController as BaseController;
use SimplePie;

class IndexController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $feed = new SimplePie();
        $feed->set_feed_url("https://steamcommunity.com/groups/Bellum-Industria/rss");
        $feed->enable_cache(false);
        $feed->set_cache_location( storage_path() . '/app/cache' );
        $feed->set_cache_duration( 60 * 60 * 12 );
        $feed->set_output_encoding('utf-8');
        $feed->init();

        dd($feed->get_items(0, 4));

        return view(
          'cvepdb.vitrine.index',
          [
            'blog_articles' => $feed->get_items(0, 4)
          ]
        );
    }
}
