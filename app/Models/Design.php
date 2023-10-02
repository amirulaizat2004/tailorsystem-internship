<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $id_style
 * @property int $id_material
 * @property int $id_fabric
 * @property string $color
 * @property string $code
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted_at
 * @property Assetlookup $assetlookup
 * @property Assetlookup $assetlookup
 * @property Assetlookup $assetlookup
 */
class Design extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */

    use SoftDeletes;
    protected $table = 'design';

    /**
     * @var array
     */
    protected $fillable = ['id_style', 'id_material', 'id_fabric', 'color', 'code', 'cust_id', 'updated_at', 'created_at', 'deleted_at', 'choice'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assetlookup()
    {
        return $this->belongsTo('App\Models\Assetlookup', 'id_material');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assetlookup1()
    {
        return $this->belongsTo('App\Models\Assetlookup', 'id_style');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assetlookup2()
    {
        return $this->belongsTo('App\Models\Assetlookup', 'id_fabric');
    }

    public function assetlookup3()
    {
        return $this->belongsTo('App\Models\Assetlookup', 'choice');
    }

    public function customers()
    {
        return $this->belongsTo('App\Models\Customer', 'cust_id');
    }
}
