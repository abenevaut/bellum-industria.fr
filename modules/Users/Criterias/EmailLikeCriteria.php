<?php namespace Modules\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Core\Criterias\Criteria as CriteriaInterface;

/**
 * Class EmailLikeCriteria
 * @package Modules\Users\Criterias
 */
class EmailLikeCriteria extends CriteriaInterface
{
    /**
     * @var array emails list
     */
    private $emails = null;

    public function __construct($emails)
    {
        $this->emails = $emails;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('email', 'LIKE', '%' . $this->emails . '%');
        return $model;
    }
}
