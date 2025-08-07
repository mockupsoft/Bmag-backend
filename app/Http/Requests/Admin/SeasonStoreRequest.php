<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SeasonStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'row' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'İsim alanı zorunludur.',
            'name.string' => 'İsim alanı metin olmalıdır.',
            'name.max' => 'İsim en fazla 255 karakter olabilir.',
            'row.required' => 'Sıra zorunludur',
            'row.integer' => 'Sıra bir sayı olmalıdır',
            'row.min' => 'Sıra en az 1 karakter olmalıdır',
        ];
    }
}
