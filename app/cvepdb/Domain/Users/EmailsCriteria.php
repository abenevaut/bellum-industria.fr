<?php

namespace App\CVEPDB\Domain\Users;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class EmailsCriteria implements CriteriaInterface
{
    /**
     * @var array emails list
     */
    private $emails = [];

    public function __construct($emails = [])
    {
        $this->emails = $emails;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->whereIn('email', $this->emails);
        return $model;
    }
}