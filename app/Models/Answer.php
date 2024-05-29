<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        "exam_id","user_id","start_date","grade","status"
    ];

    public function Exam() :BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }
}
