<?php

namespace App\CVEPDB\Domain\Users;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\CVEPDB\Domain\Users\UserRepository;
//use App\CVEPDB\Domain\Roles\RoleRepositoryEloquent;
use App\CVEPDB\Domain\Users\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * @var null RoleRepositoryEloquent
     */
    private $r_roles = null;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name' => 'like',
        'last_name' => 'like',
        'email'
    ];

//    public function __construct(RoleRepositoryEloquent $r_roles)
//    {
//        parent::__construct();
//
//        $this->r_roles = $r_roles;
//    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Create a new user with role RoleRepository::USER
     *
     * @param $new_user ['first_name', 'last_name', 'email']
     */
    public function create_user($first_name, $last_name, $email)
    {
        $user = User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        ]);
//        $this->attach_user_to_role($user, RoleRepositoryEloquent::USER);
    }

    /**
     * Create a new user with role RoleRepository::CLIENT
     *
     * @param $new_user ['first_name', 'last_name', 'email']
     */
    public function create_client($first_name, $last_name, $email)
    {
        $user = User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        ]);
//        $this->attach_user_to_role($user, RoleRepositoryEloquent::CLIENT);
    }

    /**
     * @param $user
     * @param $role_name
     */
    protected function attach_user_to_role($user, $role_name)
    {
//        $role = $this->r_roles->role_exists($role_name);
//        $user->attachRole($role);
    }
}
