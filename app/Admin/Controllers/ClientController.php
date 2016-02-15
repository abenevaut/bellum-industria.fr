<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\UserController as Controller;
use App\Admin\Requests\UserFormRequest;

use CVEPDB\Repositories\Users\UserRepositoryEloquent;

class ClientController extends Controller
{
    private $r_user = null;

    public function __construct(UserRepositoryEloquent $r_user)
    {
        $this->r_user = $r_user;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cvepdb.admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(UserFormRequest $request)
    {
        $this->r_user->create_client($request->get('first_name'), $request->get('last_name'), $request->get('email'));
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UserFormRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
