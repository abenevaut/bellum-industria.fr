<?php

namespace App\CVEPDB\Admin\Repositories;

use \App\Role;

class RoleRepository
{
    const ADMIN = 'admin';
    const CLIENT = 'client';
    const USER = 'user';

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
     * Check if role exists and control that role exists in DB.
     *
     * @param string $role_name Role::ADMIN | Role::CLIENT | Role::User
     * @return Role|null
     */
    static public function role_exists($role_name)
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