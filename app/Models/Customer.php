<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'customer';

    protected $primaryKey = 'cust_id';

    public $incrementing = true;

    // boleh edit
    protected $fillable = ['name','email','address', 'no_phone'];

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

    public function scopeFilter($query, array $filters)
    {
        if(isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        }
    }

    // public function orders()
    // {
    //     return $this->hasMany('App\Models\Order', 'cust_id');
    // }
}
