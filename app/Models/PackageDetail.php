<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PackageDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function exam() : BelongsTo
    {
        return $this->BelongsTo(Exam::class,'exam_id');
    }
}
