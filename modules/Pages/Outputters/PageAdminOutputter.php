<?php namespace Modules\Pages\Outputters;

use Config;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;
use Modules\Pages\Repositories\PagesRepositoryEloquent;

class PageAdminOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'Pages';

    /**
     * @var string Outputter header description
     */
    protected $description = 'page redaction';

    /**
     * @var PagesRepositoryEloquent|null
     */
    protected $r_page = null;

    public function __construct(
        PagesRepositoryEloquent $r_page
    )
    {
        parent::__construct();

        $this->set_current_module('pages');

        $this->r_page = $r_page;

        $this->addBreadcrumb('Pages', 'admin/pages');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pages = $this->r_page->all();

        return $this->output(
            'pages.admin.index',
            [
                'pages' => $pages
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->output(
            'pages.admin.create',
            [
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(IFormRequest $request)
    {
        $page = $this->r_page->create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'is_home' => $request->get('is_home')
        ]);
        return $this->redirectTo('admin/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

//        return $this->output(
//            'pages.admin.edit',
//            [
//            ]
//        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, IFormRequest $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }
}