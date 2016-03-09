<?php

namespace App\Vitrine\Controllers;

use CVEPDB\Controllers\AbsBaseController as BaseController;
use App\Admin\Repositories\Posts\RssRepository;

class IndexController extends BaseController
{
    private $r_rss = null;

    public function __construct(RssRepository $r_rss) {
        $this->r_rss = $r_rss;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view(
          'cvepdb.vitrine.index',
          [
            'blog_articles' => $this->r_rss->get_cvepdb_blog_items()
          ]
        );
    }
}
