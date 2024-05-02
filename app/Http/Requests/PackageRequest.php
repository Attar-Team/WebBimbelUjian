<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            "name"=> "required",
            "category"=> "required",
            "type"=> "required|string",
            "price"=> "required",
            "discount"=> "required",
            "file"=> "required",
            "is_review"=> "array",
            "access"=> "array",
            "question"=> "array",
            "video"=> "array",
            "pdf"=> "array",
        ];
    }
}
