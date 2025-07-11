<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'         => 'required|string|max:255',
            'summary'       => 'required|string|max:1000',
            'content'       => 'required|string',
            'category_id'   => 'required|integer|exists:categories,id',
            'magazine_id'   => 'required|integer|exists:magazines,id',
            'image'         => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Başlık alanı zorunludur.',
            'summary.required' => 'Özet alanı zorunludur.',
            'content.required' => 'İçerik alanı zorunludur.',
            'image.required' => 'Resim alanı zorunludur.',
            'category_id.required' => 'Kategori alanı zorunludur.',
            'magazine_id.required' => 'Degi alanı zorunludur.',
        ];
    }
}
