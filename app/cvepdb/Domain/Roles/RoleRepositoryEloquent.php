<?php

namespace App\CVEPDB\Domain\Roles;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\CVEPDB\Domain\Roles\RoleRepository;
use App\CVEPDB\Domain\Roles\Role;

/**
 * Class RoleRepositoryEloquent
 * @package App\CVEPDB\Domain\Roles
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    const ADMIN = 'admin';
    const CLIENT = 'client';
    const USER = 'user';

    /**
     * @var array
     */
    static private $list = [
        self::ADMIN => [
            'display_name' => 'User Administrator',
            'description' => 'User is allowed to manage and edit other users',
        ],
        self::CLIENT => [
            'display_name' => 'User Customer',
            'description' => 'User is allowed to manage and edit projects',
        ],
        self::USER => [
            'display_name' => 'User',
            'description' => 'User is allowed to visit',
        ],
    ];

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'display_name' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Check if role exists and control that role exists in DB.
     *
     * @param $role_name self::ADMIN | self::USER | self::USER
     * @return \App\CVEPDB\Domain\Roles\Role
     * @throws \Exception
     */
    public function role_exists($role_name)
    {
        $role = Role::where('name', $role_name)->first();

        if (is_null($role) && array_key_exists($role_name, self::$list)) {
            $role = new Role();
            $role->name = $role_name;
            $role->display_name = self::$list[$role_name]['display_name']; // optional
            $role->description = self::$list[$role_name]['description']; // optional
            $role->save();
        }

        if (is_null($role)) {
            throw new \Exception(
                'RoleRepository::role_exists | role : ' . $role_name . ' not exists and could not be created'
            );
        }
        return $role;
    }
}
