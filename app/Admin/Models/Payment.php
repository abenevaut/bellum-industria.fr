<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
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
