<?php namespace Modules\Users\Repositories;

use Modules\Users\Entities\User;
use Core\Domain\Users\Repositories\UserRepositoryEloquent as UserRepositoryEloquentParent;
use Modules\Users\Criterias\EmailLikeCriteria;
use Modules\Users\Criterias\UserNameLikeCriteria;
use Modules\Users\Criterias\RolesCriteria;
use Illuminate\Container\Container as Application;
use Modules\Users\Repositories\RoleRepositoryEloquent;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends UserRepositoryEloquentParent
{
    public function __construct(Application $app, RoleRepositoryEloquent $r_roles)
    {
        parent::__construct($app, $r_roles);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function allWithTrashed()
    {
        return User::withTrashed()->get();
    }

    public function onlyTrashed()
    {
        return User::onlyTrashed()->get();
    }

    public function allCount()
    {
        return User::all()->count();
    }

    /**
     * @param string $name
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function filterUserName($name)
    {
        $this->pushCriteria(new UserNameLikeCriteria($name));
    }

    /**
     * @param string $email
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function filterEmail($email)
    {
        $this->pushCriteria(new EmailLikeCriteria($email));
    }

    /**
     * @param array $roles list of roles IDs
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function filterRoles($roles = [])
    {
        $roles = array_filter($roles);

        if (count($roles)) {
            $this->pushCriteria(new RolesCriteria($roles));
        }
    }

    public function findAndDelete($id)
    {
        $user = $this->find($id);

        $role = $this->r_roles->role_exists(RoleRepositoryEloquent::ADMIN);
        if ($user->roles->contains($role->id) && 1 === $this->r_roles->count_users_by_roles([RoleRepositoryEloquent::ADMIN])) {
            throw new \Exception('users::repository.findanddelete.error:this_is_the_last_user_admin', 1);
        }

        /*
         * delete all roles except user; in case the user was re-activated
         */

        $user->roles()->detach();
        // Always attach client role
        $role = $this->r_roles->role_exists(RoleRepositoryEloquent::USER);
        $user->attachRole($role);

        /*
         * delete api key
         */

        $user->apikey()->delete();

        /*
         * delete user
         */

        $user->delete();
    }
}
