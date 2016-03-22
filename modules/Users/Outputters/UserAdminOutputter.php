<?php namespace Modules\Users\Outputters;

use Config;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;
use Modules\Users\Repositories\UserRepositoryEloquent;
use Modules\Users\Repositories\ApiKeyRepositoryEloquent;
use CVEPDB\Repositories\Roles\RoleRepositoryEloquent;

class UserAdminOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'users::admin.meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'users::admin.meta_description';

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
        $users = $this->r_user->paginate(config('app.pagination'), ['last_name', 'first_name', 'email']);

        return $this->output(
            'users.admin.index',
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
        // On exclue le role user qui est ajoute par defaut
        $roles = $this->r_role->findWhereNotIn('name', ['user']);

        return $this->output(
            'users.admin.create',
            [
                'roles' => $roles
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
        $user = $this->r_user->create_user(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email')
        );

        $this->r_apikey->generate_api_key($user);

        $roles = $request->only('user_role_id');

        if (count($roles['user_role_id']) > 0) {
            $user->roles()->attach($roles['user_role_id']);
        }

        return $this->redirectTo('admin/users');
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
        $user = $this->r_user->find($id);

        // On exclue le role user qui est ajoute par defaut
        $roles = $this->r_role->findWhereNotIn('name', ['user']);

        return $this->output(
            'users.admin.edit',
            [
                'user' => $user,
                'roles' => $roles
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
        $this->r_user->update([
            // '' => $request->get('')
        ], $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return 'T\'es pas fou! On supprime pas les utilisateurs!';
    }
}