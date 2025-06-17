<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone_number' => ['required', 'string', 'regex:/^0\d{10}$/', 'unique:users,phone_number'],
            'password' => ['required', 'string', 'min:6'],
            'roles' => ['required', 'array', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name_surname.required' => 'Ad soyad alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.unique' => 'Bu e-posta zaten kayıtlı.',
            'phone_number.required' => 'Telefon numarası zorunludur.',
            'phone_number.string' => 'Telefon numarası metin olmalıdır.',
            'phone_number.regex' => 'Telefon numarası 0 ile başlamalı ve 11 haneli olmalıdır.',
            'phone_number.unique' => 'Bu telefon numarası zaten kayıtlı.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'roles.required' => 'En az bir rol seçmelisiniz.',
            'roles.array' => 'Roller dizi formatında olmalıdır.',
            'roles.min' => 'En az bir rol seçmelisiniz.'
        ];
    }
}
