<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "question_id",
        "content_answer",
        "photo",
        "correct_answer",
    ];
}
