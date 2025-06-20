<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'         => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Başlık alanı zorunludur.'
        ];
    }
}
