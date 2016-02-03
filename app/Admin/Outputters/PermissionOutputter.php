<?php

namespace App\CVEPDB\Admin\Outputters;

use App\CVEPDB\Interfaces\Outputters\ICRUDOutputter;
use App\CVEPDB\Interfaces\Outputters\AbsLaravelOutputter;
use App\CVEPDB\Interfaces\Requests\IFormRequest;
use App\CVEPDB\Domain\Users\UserRepositoryEloquent;

class PermissionOutputter extends AbsLaravelOutputter implements ICRUDOutputter
{
    /**
     * @var null UserRepositoryEloquent
     */
    private $r_user = null;

    public function __construct(UserRepositoryEloquent $r_user)
    {
        parent::__construct();

        $this->r_user = $r_user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->r_user->paginate(null, ['*']);

        return $this->output(
            'cvepdb.admin.users.index',
            [
                'users' => $users
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->output(
            'cvepdb.admin.users.create',
            []
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
        $this->r_user->create_user(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email')
        );
        return $this->redirectTo('admin/users');
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
    public function update($id, IFormRequest $request)
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