<?php namespace Modules\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Core\Criterias\Criteria as AbsCriteria;

/**
 * Class RolesCriteria
 * @package Modules\Users\Criterias
 */
class RolesCriteria extends AbsCriteria
{
    /**
     * @var array roles list of roles IDs
     */
    private $roles = [];

    /**
     * @param array $roles
     */
    public function __construct($roles = [])
    {
        $this->roles = $roles;
    }

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if (count($this->roles)) {
            $model = $model->roles()->whereIn('id', $this->roles);
        }
        return $model;
    }
}
