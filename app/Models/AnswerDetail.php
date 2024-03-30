<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function question_details() :BelongsTo
    {
        return $this->belongsTo(QuestionDetail::class,"question_detail_id");
    }

    public function question() :BelongsTo
    {
        return $this->belongsTo(Question::class,"question_id");
    }
}
