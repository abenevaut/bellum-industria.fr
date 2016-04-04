<?php namespace Modules\Pages\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Pages\Repositories\PagesRepositoryEloquent;

class PagesController extends Controller
{
    /**
     * @var PagesRepositoryEloquent|null
     */
    protected $r_page = null;

    public function __construct(
        PagesRepositoryEloquent $r_page
    )
    {
        $this->r_page = $r_page;
    }

    public function homepage()
    {
        $page = $this->r_page->findWhere(['is_home' => true])->first();

        return cmsview(
            'pages::pages.pages.page',
            [
                'header' => [
                    'title' => '',
                    'description' => ''
                ],
                'page' => [
                    'title' => $page->title,
                    'content' => $page->content
                ]
            ]
        );
    }

    public function map($page)
    {

        $page = $this->r_page->findWhere(['title' => $page])->first();

        return cmsview(
            'pages::pages.pages.page',
            [
                'header' => [
                    'title' => '',
                    'description' => ''
                ],
                'page' => [
                    'title' => $page->title,
                    'content' => $page->content
                ]
            ]
        );
    }

}