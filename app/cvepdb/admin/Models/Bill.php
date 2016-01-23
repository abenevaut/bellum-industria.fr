<?php

namespace App\CVEPDB\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entite_vendor_id',
        'entite_client_id',
        'reference',
        'date_emission',
        'currency',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get bills parts.
     */
    public function parts()
    {
        return $this->hasMany('App\CVEPDB\Admin\Models\BillPart');
    }

    /**
     * Get the bill
     */
    public function vendor()
    {
        return $this->hasOne('App\CVEPDB\Admin\Models\Entite', 'id', 'entite_vendor_id');
    }

    /**
     * Get the bill
     */
    public function client()
    {
        return $this->hasOne('App\CVEPDB\Admin\Models\Entite', 'id', 'entite_client_id');
    }

    /**
     * Get the payment
     */
    public function payment()
    {
        return $this->hasOne('App\CVEPDB\Admin\Models\Payment');
    }
}
