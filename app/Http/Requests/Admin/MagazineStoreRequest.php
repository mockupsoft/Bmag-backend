<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MagazineStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'description'   => 'required|string|max:1000',
            'image'         => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'         => 'Adı alanı zorunludur.',
            'description.required'  => 'Açıklama alanı zorunludur.',
            'image.required'        => 'Resim alanı zorunludur.',
        ];
    }
}
