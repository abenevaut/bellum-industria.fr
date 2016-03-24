<?php namespace Modules\Users\Outputters;

use Config;
use App\Http\Front\Outputters\FrontOutputter;
use Modules\Users\Repositories\UserRepositoryEloquent;
use Modules\Users\Repositories\ApiKeyRepositoryEloquent;
use CVEPDB\Repositories\Roles\RoleRepositoryEloquent;

class AuthOutputter extends FrontOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'users::login.frontend_meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'users::login.frontend_meta_description';

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
        ApiKeyRepositoryEloquent $r_apikey)
    {
        $this->r_user = $r_user;
        $this->r_role = $r_role;
        $this->r_apikey = $r_apikey;

        $this->set_current_module('users');
    }

    public function create(array $data) {
        $user = $this->r_user->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $this->r_apikey->generate_api_key($user);

        // Always attach client role
        $role = $this->r_role->role_exists(RoleRepositoryEloquent::USER);
        $user->attachRole($role);

        return $user;
    }
}