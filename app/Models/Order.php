<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $order_id
 * @property int $cust_id
 * @property int $design_id
 * @property int $measure_id
 * @property string $date
 * @property int $quantity
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 * @property Design $design
 * @property Measurement $measurement
 */
class Order extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */

    use SoftDeletes;
    protected $table = 'order';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'order_id';

    /**
     * @var array
     */
    protected $fillable = ['cust_id', 'deadline', 'total', 'status', 'date', 'quantity', 'price', 'total', 'created_at', 'updated_at', 'meas_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'cust_id','cust_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function design()
    {
        return $this->belongsTo('App\Models\Design','design_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measurement()
    {
        return $this->belongsTo('App\Models\Measure', 'meas_id','measure_id');
    }

    
}
