<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id','user_id','package_id','date','gross_amount'
    ];
    

    // public function package() :HasMany
    // {
    //     return $this->HasMany(Package::class, 'package_id');
    // }

    public function order_details() : HasMany
    {
        return $this->HasMany(OrderDetail::class,'order_id','id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
