<?php

namespace App\CVEPDB\Domain\Roles;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\CVEPDB\Domain\Permissions\PermissionRepository;
use App\CVEPDB\Domain\Permissions\Permission;

/**
 * Class PermissionRepositoryEloquent
 * @package App\CVEPDB\Domain\Roles
 */
class PermissionRepositoryEloquent extends BaseRepository implements RoleRepository
{
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
        return Permission::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
