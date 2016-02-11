<?php

namespace App\Admin\Repositories\Bills;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Payment extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_account_id',
        'date',
        'bill_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the bill
     */
    public function bill()
    {
        return $this->hasOne('App\Admin\Models\Bill', 'id', 'bill_id');
    }

    /**
     * Get the bankaccount
     */
    public function bankaccount()
    {
        return $this->hasOne('App\Admin\Models\BankAccount');
    }
}
