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


    public function course() : BelongsTo
    {
        return $this->BelongsTo(Course::class,'course_id','id');
    }

    public function Exam() : BelongsTo
    {
        return $this->BelongsTo(Exam::class,'exam_id');
    }

    public function order() :HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function answer() :HasMany
    {
        return $this->hasMany(Answer::class,'exam_id','exam_id');
    }

}
