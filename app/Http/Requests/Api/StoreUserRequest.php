<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone_number' => ['required', 'string', 'regex:/^(\+90|0)?5\d{9}$/', 'unique:users,phone_number'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ];
    }

    public function messages(): array
    {
        return [
            'name_surname.required' => 'Ad Soyad alanı zorunludur.',
            'name_surname.string' => 'Ad Soyad metin türünde olmalıdır.',
            'name_surname.max' => 'Ad Soyad en fazla 255 karakter olabilir.',

            'email.required' => 'E-posta alanı zorunludur.',
            'email.string' => 'E-posta metin türünde olmalıdır.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.max' => 'E-posta en fazla 255 karakter olabilir.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',

            'phone.required' => 'Telefon numarası zorunludur.',
            'phone.string' => 'Telefon numarası metin türünde olmalıdır.',
            'phone.regex' => 'Telefon numarası geçerli bir Türk cep telefonu formatında olmalıdır.',
            'phone.unique' => 'Bu telefon numarası zaten kayıtlı.',

            'password.required' => 'Şifre alanı zorunludur.',
            'password.string' => 'Şifre metin türünde olmalıdır.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            'password.confirmed' => 'Şifre tekrarı eşleşmiyor.',
        ];
    }

}
