<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function packageDetail() :HasMany
    {
        return $this->hasMany(PackageDetail::class,'package_id','id');
    }
    // public function packageDetailPaket() :BelongsTo
    // {
    //     return $this->BelongsTo(PackageDetail::class,'package_id');
    // }

    public function order_detail(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'package_id');
    }
}
