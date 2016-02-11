<?php

namespace App\Admin\Repositories\BankAccounts;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin\Repositories\BankAccounts\BankAccountRepository;
use App\Admin\Repositories\BankAccounts\BankAccount;

/**
 * Class BankAccountRepositoryEloquent
 * @package namespace App\Admin\Repositories\BankAccounts;
 */
class BankAccountRepositoryEloquent extends BaseRepository implements BankAccountRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BankAccount::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
