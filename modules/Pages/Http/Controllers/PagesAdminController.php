<?php namespace Modules\Pages\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Pages\Outputters\PageAdminOutputter;
use Modules\Pages\Http\Requests\AdminPagesFormRequest;

class PagesAdminController extends Controller
{
    private $outputter = null;

    public function __construct(
        PageAdminOutputter $outputter
    )
    {
        $this->outputter = $outputter;
    }

    public function index()
    {
        return $this->outputter->index();
    }

    public function create()
    {
        return $this->outputter->create();
    }

    public function store(AdminPagesFormRequest $request)
    {
        return $this->outputter->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->outputter->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->outputter->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, AdminPagesFormRequest $request)
    {
        return $this->outputter->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return $this->outputter->destroy($id);
    }
}