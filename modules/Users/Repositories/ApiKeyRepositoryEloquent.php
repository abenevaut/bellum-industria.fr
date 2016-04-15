<?php namespace Modules\Users\Repositories;

use Core\Domain\Users\Repositories\UserRepositoryEloquent as BaseRepository;
use Core\Domain\Users\Repositories\ApiKeyRepository;
use Core\Domain\Users\Entities\ApiKey;
use Illuminate\Container\Container as Application;
use Modules\Users\Repositories\RoleRepositoryEloquent as RoleRepositoryEloquent;

/**
 * Class ApiKeyRepositoryEloquent
 * @package Modules\Users\Repositories
 */
class ApiKeyRepositoryEloquent extends BaseRepository implements ApiKeyRepository
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
        return parent::model();
    }
}
