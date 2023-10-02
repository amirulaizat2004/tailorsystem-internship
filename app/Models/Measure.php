<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Measure extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'measurement';

    protected $primaryKey = 'measure_id';

    public $incrementing = true;

    // boleh edit
    protected $fillable = ['meas_code','shoulder','sleeve', 'chest', 'length_top', 'waist', 'hip', 'length_bot', 'bottom', 'waist_top', 'design_id'];

    public function designs()
    {
        return $this->belongsTo('App\Models\Design', 'design_id');
    }
}
