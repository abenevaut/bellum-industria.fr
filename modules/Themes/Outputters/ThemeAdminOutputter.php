<?php namespace Modules\Themes\Outputters;

use Config;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;

class ThemeAdminOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'Themes';

    /**
     * @var string Outputter header description
     */
    protected $description = 'theme selection';


    public function __construct(
    )
    {
        parent::__construct();

        $this->set_current_module('themes');

        $this->addBreadcrumb('Themes', 'admin/themes');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->output(
            'themes.admin.index',
            [
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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