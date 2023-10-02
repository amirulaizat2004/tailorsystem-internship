<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $description
 * @property string $group
 * @property string $code
 * @property Design[] $designs
 * @property Design[] $designs
 * @property Design[] $designs
 */
class Assetlookup extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'assetlookup';

    /**
     * @var array
     */
    protected $fillable = ['description', 'group', 'code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function material()
    {
        return $this->hasMany('App\Models\Design', 'id_material');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function style()
    {
        return $this->hasMany('App\Models\Design', 'id_style');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fabric()
    {
        return $this->hasMany('App\Models\Design', 'id_fabric');
    }
}
