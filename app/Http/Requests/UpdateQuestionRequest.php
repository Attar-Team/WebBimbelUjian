<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "exam_id"=> "required",
            "question_detail_id" => "required",
            "question"=> "required",
            "content_answer"=> "required",
            "review"=> "required",
            "is_correct"=> "required",
        ];
    }
}
