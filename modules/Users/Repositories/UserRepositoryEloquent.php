<?php namespace Modules\Users\Repositories;

use Modules\Users\Entities\User;
use CVEPDB\Repositories\Users\UserRepositoryEloquent as UserRepositoryEloquentParent;
use Modules\Users\Criterias\EmailLikeCriteria;
use Modules\Users\Criterias\UserNameLikeCriteria;
use Modules\Users\Repositories\RoleRepositoryEloquent;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends UserRepositoryEloquentParent
{
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

    public function filterUserName($name)
    {
        $this->pushCriteria(new UserNameLikeCriteria($name));
    }

    public function filterEmail($email)
    {
        $this->pushCriteria(new EmailLikeCriteria($email));
    }

    public function findAndDelete($id)
    {
        $user = $this->find($id);

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
