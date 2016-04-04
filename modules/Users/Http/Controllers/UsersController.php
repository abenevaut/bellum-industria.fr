<?php namespace Modules\Users\Http\Controllers;

use Request;
use Pingpong\Modules\Routing\Controller;
use Modules\Users\Outputters\UserOutputter;
use Modules\Users\Http\Requests\UserFormRequest;

class UsersController extends Controller {

    /**
     * @var UserOutputter|null
     */
    protected $outputter = null;

    /**
     * @param UserOutputter $outputter
     */
    public function __construct(UserOutputter $outputter)
    {
        $this->outputter = $outputter;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return null;
    }

    /**
     * @return Response
     */
    public function create()
    {
        return null;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store( $request)
    {
        return null;
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
    public function update($id, UserFormRequest $request)
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
        return null;
    }

    public function myProfile()
    {
        if (\Auth::check()) {
            return $this->show(\Auth::user()->id);
        }
        abort(404);
    }

    public function editMyProfile()
    {
        if (\Auth::check()) {
            return $this->edit(\Auth::user()->id);
        }
        abort(404);
    }

    public function updateMyProfile(UserFormRequest $request)
    {
        if (\Auth::check()) {
            return $this->update(\Auth::user()->id, $request);
        }
        abort(404);
    }
}