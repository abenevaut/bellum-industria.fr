<?php namespace Modules\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class EmailLikeCriteria implements CriteriaInterface
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
