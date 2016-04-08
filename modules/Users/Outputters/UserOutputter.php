<?php namespace Modules\Users\Outputters;

use Auth;
use Config;
use Session;
use Request;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;
use Modules\Users\Repositories\UserRepositoryEloquent;
use Modules\Users\Repositories\ApiKeyRepositoryEloquent;
use CVEPDB\Repositories\Roles\RoleRepositoryEloquent;
use Modules\Users\Events\Admin\UserUpdatedEvent;
use Modules\Users\Events\Admin\UserDeletedEvent;

/**
 * Class UserOutputter
 * @package Modules\Users\Outputters
 */
class UserOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'users::front.meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'users::front.meta_description';

    /**
     * @var null UserRepositoryEloquent
     */
    private $r_user = null;

    /**
     * @var RoleRepositoryEloquent|null
     */
    private $r_role = null;

    /**
     * @var ApiKeyRepositoryEloquent|null
     */
    private $r_apikey = null;

    public function __construct(
        UserRepositoryEloquent $r_user,
        RoleRepositoryEloquent $r_role,
        ApiKeyRepositoryEloquent $r_apikey
    )
    {
        parent::__construct();

        $this->set_current_module('users');

        $this->r_user = $r_user;
        $this->r_role = $r_role;
        $this->r_apikey = $r_apikey;

        $this->addBreadcrumb('Users', 'admin/users');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->redirectTo('users/my-profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return null;
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
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->r_user->find($id);

        return $this->output(
            'users.users.show',
            [
                'user' => $user
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->r_user->find($id);

        return $this->output(
            'users.users.edit',
            [
                'user' => $user
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, IFormRequest $request)
    {
        $user = $this->r_user->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email')
        ], $id);

        event(new UserUpdatedEvent($user));

        return $this->redirectTo('users/my-profile')
            ->with('message-success', 'users::admin.edit.message.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return null;

//        $this->r_user->findAndDelete($id);
//
//        event(new UserDeletedEvent($id));
//
//        return $this->redirectTo('admin/users')
//            ->with('message-success', 'users::admin.delete.message.success');
    }
}