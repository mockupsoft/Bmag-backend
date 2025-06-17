<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_surname' => ['required', 'string', 'max:255'],
            'roles' => ['required', 'array', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name_surname.required' => 'Ad soyad alanı zorunludur.',
            'name_surname.max' => 'Ad soyad alanı  en fazla 255 karakter olabilir.',
            'roles.required' => 'En az bir rol seçmelisiniz.',
            'roles.array' => 'Roller dizi formatında olmalıdır.',
            'roles.min' => 'En az bir rol seçmelisiniz.'
        ];
    }
}
