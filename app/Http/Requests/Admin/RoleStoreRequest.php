<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255'],
            'permissions' => ['required', 'array', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'label.required' => 'Rol adı zorunludur.',
            'label.string' => 'Rol adı geçerli bir metin olmalıdır.',
            'permissions.required' => 'En az bir yetki seçmelisiniz.',
            'permissions.array' => 'Yetkiler dizi formatında olmalıdır.',
            'permissions.min' => 'En az bir yetki seçmelisiniz.',
        ];
    }
}
