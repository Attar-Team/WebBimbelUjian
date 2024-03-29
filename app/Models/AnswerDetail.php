<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "answer_id",
        "question_id",
        "question_detail_id",
        "is_correct",
        "is_doubtful",
    ] ;
}
