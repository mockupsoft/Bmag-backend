<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_surname' => 'required|string|max:255',
            'email'         => 'required|string|max:255',
            'subject'      => 'required|string|max:255',
            'message'      => 'required|string|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'name_surname.required' => 'Ad soyad alanı zorunludur.',
            'email.required'        => 'E-posta alanı zorunludur.',
            'subject.required'      => 'Konu alanı zorunludur.',
            'message.required'      => 'Mesaj alanı zorunludur.',
            'message.min'           => 'Mesaj en az 10 karakter olmalıdır.',
        ];
    }
}
