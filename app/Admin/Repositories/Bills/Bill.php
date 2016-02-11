<?php

namespace App\Admin\Repositories\Bills;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Bill extends Model implements Transformable
{
    use TransformableTrait;

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
        'description',
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
        return $this->hasMany('App\Admin\Repositories\Bills\BillPart');
    }

    /**
     * Get the bill
     */
    public function vendor()
    {
        return $this->hasOne('App\Admin\Repositories\Entite', 'id', 'entite_vendor_id');
    }

    /**
     * Get the bill
     */
    public function client()
    {
        return $this->hasOne('App\Admin\Repositories\Entite', 'id', 'entite_client_id');
    }

    /**
     * Get the payment
     */
    public function payment()
    {
        return $this->hasOne('App\Admin\Repositories\Payment');
    }
}
