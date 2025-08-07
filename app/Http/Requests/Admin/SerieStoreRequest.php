<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SerieStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'cover_image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'], // max 2MB
            'row' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'İsim alanı zorunludur.',
            'name.string' => 'İsim alanı metin olmalıdır.',
            'name.max' => 'İsim en fazla 255 karakter olabilir.',
            'description.string' => 'Açıklama alanı metin olmalıdır.',
            'description.required' => 'Açıklama alanı zorunludur.',
            'cover_image.required' => 'Kapak görseli zorunludur.',
            'cover_image.image' => 'Kapak görseli bir resim olmalıdır.',
            'cover_image.mimes' => 'Kapak görseli sadece jpeg, png, jpg veya webp formatında olabilir.',
            'cover_image.max' => 'Kapak görseli en fazla 2MB olabilir.',
            'row.required' => 'Sıra zorunludur',
            'row.integer' => 'Sıra bir sayı olmalıdır',
            'row.min' => 'Sıra en az 1 karakter olmalıdır',
        ];
    }
}
