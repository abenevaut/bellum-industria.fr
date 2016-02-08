<?php

namespace App\Multigaming\Repositories;

use CVEPDB\Repositories\Roles\RoleRepositoryEloquent;
use CVEPDB\Repositories\Roles\Role;

/**
 * Class RoleRepository
 * @package App\Multigaming\Repositories
 */
class RoleRepository extends RoleRepositoryEloquent
{
    const GAMER_ADMIN = 'gamer-admin';
    const GAMER_USER = 'gamer-user';

    /**
     * @var array
     */
    static private $gamer_list = [
        self::GAMER_ADMIN => [
            'display_name' => 'Gamer Administrator',
            'description' => 'Gamer is allowed to manage and edit other users',
        ],
        self::GAMER_USER => [
            'display_name' => 'Gamer',
            'description' => 'Gamer is allowed to visit',
        ],
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
     * Check if role exists and control that role exists in DB.
     *
     * @param $role_name self::ADMIN | self::USER | self::USER
     * @return \App\CVEPDB\Domain\Roles\Role
     * @throws \Exception
     */
    public function role_exists($role_name)
    {
        $role = Role::where('name', $role_name)->first();

        if (is_null($role) && array_key_exists($role_name, self::$gamer_list)) {
            $role = new Role();
            $role->name = $role_name;
            $role->display_name = self::$gamer_list[$role_name]['display_name']; // optional
            $role->description = self::$gamer_list[$role_name]['description']; // optional
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