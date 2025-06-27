<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name_surname" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "name_surname.required" => "Adı soyadı zorunlu alandır"
        ];
    }
}
