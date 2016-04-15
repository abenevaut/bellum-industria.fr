<?php namespace Modules\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Core\Criterias\Criteria as CriteriaInterface;

/**
 * Class UserNameLikeCriteria
 * @package Modules\Users\Criterias
 */
class UserNameLikeCriteria extends CriteriaInterface
{
    /**
     * @var array emails list
     */
    private $name = null;

    public function __construct($name = [])
    {
        $this->name = $name;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model
            ->where('first_name', 'LIKE', '%' . $this->name . '%')
            ->orwhere('last_name', 'LIKE', '%' . $this->name . '%');
        return $model;
    }
}
