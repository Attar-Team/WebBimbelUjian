<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'name'=> 'required',
            'duration'=> 'required',
            'amount_question'=> 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field nama harus di isi.',
            'duration.required' => 'Field durasi harus di isi.',
            'amount_question.required' => 'Field banyak soal harus di isi.',
            'amount_question.numeric' => 'Field banyak soal harus berisi angka.'
        ];
    }
}
