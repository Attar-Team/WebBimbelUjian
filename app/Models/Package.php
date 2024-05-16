<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function packageDetail() :HasMany
    {
        return $this->hasMany(PackageDetail::class);
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class, 'package_id');
    }
}
