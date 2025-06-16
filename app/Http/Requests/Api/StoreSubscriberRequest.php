<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_surname' => 'required|string|max:255',
            'email' => 'required|email|unique:subscribers,email',
        ];
    }

    public function messages(): array
    {
        return [
            'name_surname.required' => 'Ad soyad alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.unique' => 'Bu e-posta ile zaten kayıt olunmuş.',
        ];
    }
}

