<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class BillPart extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bills_parts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_id',
        'designation',
        'quantity',
        'unit_price_without_vat',
        'price_without_vat',
        'amount_vat',
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
        return $this->hasOne('App\Admin\Models\Bill');
    }
}
