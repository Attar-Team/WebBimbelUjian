<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            "exam_id"=> "numeric|required",
            "question"=> "required",
            "content_answer"=> "required|array",
            "content_answer.*"=> "required",
            "review"=> "required",
            // "question_detail"=> "required",
            "is_correct"=> "required",
        ];
    }

//     public function messages()
// {
//     return [
//         'question.required' => 'Field Soal harus di isi.',
//         'review.required' => 'Field review harus di isi.',
//         'review.*' => 'Field review harus di isi.'
//     ];
// }
}
